<?php

declare(strict_types=1);

namespace App\Models;

enum LeaderboardStatus: string
{
    case Done = 'done';
    case Playing = 'playing';
}
