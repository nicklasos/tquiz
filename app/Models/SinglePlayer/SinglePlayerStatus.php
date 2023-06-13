<?php

declare(strict_types=1);

namespace App\Models\SinglePlayer;

enum SinglePlayerStatus: string
{
    case Playing = 'playing';
    case Done = 'done';
}
