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
            ->leftJoin('games', 'games.id', '=', 'leaderboards.game_id')
            ->where('games.game_seed_id', $game->game_seed_id)
            ->where('games.temp_user_id', $game->temp_user_id)
            ->get();
    }
}
