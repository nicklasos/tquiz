<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Game;
use App\Models\Leaderboard;

class CreateLeaderboard
{
    public function create(Game $game, bool $isMainUser): void
    {
        Leaderboard::create([
            'temp_user_id' => $game->temp_user_id,
            'game_id' => $game->id,
            'score' => $game->score,
            'place' => $game->getPlace(),
            'is_main_user' => $isMainUser,
        ]);
    }
}
