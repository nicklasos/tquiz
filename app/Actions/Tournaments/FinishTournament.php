<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Game;
use App\Queries\Tournaments\FinishTournamentGamesQuery;
use Illuminate\Database\Eloquent\Collection;

class FinishTournament
{
    public function __construct(
        private readonly CreateLeaderboard          $createLeaderboard,
        private readonly FinishTournamentGamesQuery $finishTournamentGames,
    )
    {
    }

    public function finish(Game $game): void
    {
        // @todo: use db locks

        $otherGames = $this->finishTournamentGames->getGamesForLeaderboard($game);

        $game->status = 'waiting_participants';
        $game->save();

        if ($otherGames->count() + 1 < $game->tournament->players) {
            return;
        }

        /** @var Collection<int, Game> $allGames */
        $allGames = $otherGames
            ->add($game)
            ->sortByDesc('score')
            ->map(function (Game $game, $i) {
                $game->setPlace($i + 1);

                return $game;
            });

        foreach ($allGames as $currentGame) {

            if ($currentGame->status === 'waiting_participants') {

                $currentGame->status = 'done';
                $currentGame->save();

                foreach ($allGames as $leaderboardGame) {
                    $this->createLeaderboard->create(
                        $currentGame->id,
                        $leaderboardGame,
                        $leaderboardGame->temp_user_id === $currentGame->temp_user_id,
                    );
                }

            }

        }
    }
}
