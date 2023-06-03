<?php

declare(strict_types=1);

namespace App\Models\Tournaments;

enum LeaderboardStatus: string
{
    case Done = 'done';
    case Playing = 'playing';
}
