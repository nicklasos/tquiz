<?php

declare(strict_types=1);

namespace App\Services\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\Leaderboard;
use App\Queries\Tournaments\LeaderboardQuery;
use Illuminate\Database\Eloquent\Collection;

class LeaderboardService
{
    public function __construct(private readonly LeaderboardQuery $leaderboardQuery)
    {
    }

    public function getByGame(Game $game): Collection
    {
        $leaderboards = $this->leaderboardQuery->getByGame($game);

        if ($game->isFakeWaiting()) {
            return $this->sortFakeWaiting($leaderboards);
        }

        return $leaderboards;
    }

    /**
     * @param Collection $leaderboards
     * @return Collection<Leaderboard>
     */
    private function sortFakeWaiting(Collection $leaderboards): Collection
    {
        return $leaderboards
            ->sortBy(fn(Leaderboard $l) => !$l->isDone())
            ->values()
            ->map(function (Leaderboard $l, $n) {
                $l->place = $n + 1;

                return $l;
            });
    }
}
