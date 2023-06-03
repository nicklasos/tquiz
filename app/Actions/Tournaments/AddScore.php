<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Tournaments\Game;

class AddScore
{
    public function add(Game $game, int $score): void
    {
        $game->score += $score;
        $game->save();
    }
}
