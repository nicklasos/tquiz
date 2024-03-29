<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\Leaderboard;
use Illuminate\Database\Eloquent\Collection;

class LeaderboardQuery
{
    /**
     * @param Game $game
     * @return Collection<Leaderboard>
     */
    public function getByGame(Game $game): Collection
    {
        return Leaderboard::query()
            ->with('tempUser')
            ->where('game_id', $game->id)
            ->orderByDesc('score')
            ->get();
    }
}
