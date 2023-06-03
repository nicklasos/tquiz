<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameStatus;

class DoneGame
{
    public function done(Game $game): void
    {
        $game->status = GameStatus::Done;
        $game->save();
    }
}
