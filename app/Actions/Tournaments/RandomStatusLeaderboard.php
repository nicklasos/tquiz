<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Tournaments\Leaderboard;
use App\Services\Tournaments\RandomLeaderboardStatus;

class RandomStatusLeaderboard
{
    public function __construct(private readonly RandomLeaderboardStatus $randomLeaderboardStatus)
    {
    }

    public function rollAndSave(Leaderboard $leaderboard): void
    {
        $leaderboard->status = $this->randomLeaderboardStatus->get();
        $leaderboard->save();
    }
}
