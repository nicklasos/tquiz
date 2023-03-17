<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Leaderboard;
use App\Models\TempUser;
use Illuminate\Database\Eloquent\Collection;

class LeaderboardQuery
{
    public function getByUserAndSeedId(TempUser $tempUser, int $seedId): Collection
    {
        return Leaderboard::query()
            ->leftJoin('games', 'games.id', '=', 'leaderboards.game_id')
            ->where('games.game_seed_id', $seedId)
            ->where('games.temp_user_id', $tempUser->id)
            ->get();
    }
}
