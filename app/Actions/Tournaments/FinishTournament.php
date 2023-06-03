<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameStatus;
use App\Models\Tournaments\LeaderboardStatus;
use App\Queries\Tournaments\FinishTournamentGamesQuery;
use App\Services\Tournaments\RandomLeaderboardStatus;
use Illuminate\Database\Eloquent\Collection;

class FinishTournament
{
    public function __construct(
        private readonly CreateLeaderboard          $createLeaderboard,
        private readonly CreateRandomLeaderboard    $createRandomLeaderboard,
        private readonly FinishTournamentGamesQuery $finishTournamentGames,
        private readonly RandomLeaderboardStatus    $randomLeaderboardStatus,
    )
    {
    }

    public function finish(Game $game): void
    {
        // @todo: use db locks

        $otherGames = $this->finishTournamentGames->getGamesForLeaderboard($game);

        $game->status = GameStatus::WaitingParticipants;
        $game->save();

        if ($otherGames->count() + 1 < $game->tournament->players) {
            return;
        }

        /** @var Collection<int, Game> $allGames */
        $allGames = $otherGames
            ->add($game)
            ->sortByDesc('score')
            ->values()
            ->map(function (Game $game, $i) {
                $game->setLeaderboardPlace($i + 1);

                return $game;
            });

        foreach ($allGames as $currentGame) {

            if ($currentGame->status === GameStatus::WaitingParticipants) {

                $currentGame->place = $currentGame->getLeaderboardPlace();
                $currentGame->status = GameStatus::Done;

                foreach ($allGames as $leaderboardGame) {

                    if ($this->randomLeaderboardStatus->delayNeeded()) {
                        $leaderboard = $this->createRandomLeaderboard->create(
                            $currentGame->id,
                            $leaderboardGame,
                            $leaderboardGame->temp_user_id === $currentGame->temp_user_id,
                        );

                        if ($leaderboard->status === LeaderboardStatus::Playing) {
                            $currentGame->status = GameStatus::WaitingFakeParticipants;
                        }

                    } else {
                        $this->createLeaderboard->create(
                            $currentGame->id,
                            $leaderboardGame,
                            $leaderboardGame->temp_user_id === $currentGame->temp_user_id,
                        );
                    }
                }

                $currentGame->save();
            }
        }
    }
}
