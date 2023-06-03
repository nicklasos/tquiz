<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameStatus;

class CloseGame
{
    public function close(Game $game): void
    {
        $game->status = GameStatus::Expired;
        $game->save();
    }
}
