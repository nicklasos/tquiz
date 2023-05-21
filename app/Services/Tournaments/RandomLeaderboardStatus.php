<?php

declare(strict_types=1);

namespace App\Services\Tournaments;

use App\Models\LeaderboardStatus;

class RandomLeaderboardStatus
{
    public function delayNeeded(): bool
    {
        return mt_rand(1, 10) <= 6;
    }

    public function get(): LeaderboardStatus
    {
        if (mt_rand(1, 10) <= 6) {
            return LeaderboardStatus::Done;
        }

        return LeaderboardStatus::Playing;
    }
}
