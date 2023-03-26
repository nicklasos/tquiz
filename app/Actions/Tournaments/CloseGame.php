<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Game;
use App\Models\GameStatus;

class CloseGame
{
    public function close(Game $game): void
    {
        $game->status = GameStatus::Expired;
        $game->save();
    }
}
