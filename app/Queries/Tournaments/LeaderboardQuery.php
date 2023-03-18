<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Game;
use App\Models\Leaderboard;
use Illuminate\Database\Eloquent\Collection;

class LeaderboardQuery
{
    public function getByGame(Game $game): Collection
    {
        return Leaderboard::query()
            ->with('tempUser')
            ->where('game_id', $game->id)
            ->orderByDesc('score')
            ->get();
    }
}
