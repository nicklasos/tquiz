<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\Leaderboard;
use App\Models\Tournaments\LeaderboardStatus;
use App\Services\Tournaments\RandomLeaderboardStatus;

class CreateRandomLeaderboard
{
    public function __construct(private readonly RandomLeaderboardStatus $randomLeaderboardStatus)
    {
    }

    public function create(
        int  $forGameId,
        Game $game,
        bool $isMainUser
    ): Leaderboard
    {
        return Leaderboard::create([
            'temp_user_id' => $game->temp_user_id,
            'game_id' => $forGameId,
            'score' => $game->score,
            'place' => $game->getLeaderboardPlace(),
            'is_main_user' => $isMainUser,
            'status' => $isMainUser
                ? LeaderboardStatus::Done
                : $this->randomLeaderboardStatus->get(),
        ]);
    }
}
