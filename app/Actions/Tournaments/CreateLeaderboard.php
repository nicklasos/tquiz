<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Game;
use App\Models\Leaderboard;
use App\Models\LeaderboardStatus;

class CreateLeaderboard
{
    public function create(int $forGameId, Game $game, bool $isMainUser): void
    {
        Leaderboard::create([
            'temp_user_id' => $game->temp_user_id,
            'game_id' => $forGameId,
            'score' => $game->score,
            'place' => $game->getLeaderboardPlace(),
            'is_main_user' => $isMainUser,
            'status' => LeaderboardStatus::Done,
        ]);
    }
}
