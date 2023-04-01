<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Actions\Tournaments\DoneGame;
use App\Actions\Tournaments\RandomStatusLeaderboard;
use App\Models\Game;
use App\Models\Leaderboard;
use App\Models\LeaderboardStatus;
use App\Queries\Tournaments\FakeWaitingGamesQuery;
use Illuminate\Console\Command;

class CloseLeaderboardsCommand extends Command
{
    protected $signature = 'leaderboards:close';

    protected $description = 'Random close waiting fake participants game';

    public function handle(
        FakeWaitingGamesQuery   $fakeWaitingGamesQuery,
        RandomStatusLeaderboard $randomStatusLeaderboard,
        DoneGame                $doneGame,
    ): void
    {
        $games = $fakeWaitingGamesQuery->get();

        foreach ($games as $game) {
            $leaderboard = $this->firstPlaying($game);

            if (!$leaderboard) {
                $doneGame->done($game);
                continue;
            }

            $randomStatusLeaderboard->rollAndSave($leaderboard);

            if (!$this->firstPlaying($game)) {
                $doneGame->done($game);
            }
        }
    }

    private function firstPlaying(Game $game): ?Leaderboard
    {
        return $game->leaderboards->first(
            fn(Leaderboard $leaderboard) => $leaderboard->status === LeaderboardStatus::Playing,
        );
    }
}
