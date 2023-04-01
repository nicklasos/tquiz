<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Game;
use App\Models\GameStatus;

class DoneGame
{
    public function done(Game $game): void
    {
        $game->status = GameStatus::Done;
        $game->save();
    }
}
