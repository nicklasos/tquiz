<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Game;
use App\Models\TempUser;
use App\Models\Tournament;

class GameQuery
{
    public function bySeedAndUser(TempUser $tempUser, int $seedId): Game
    {
        return Game::query()
            ->where('temp_user_id', $tempUser->id)
            ->where('game_seed_id', $seedId)
            ->firstOrFail();
    }
}
