<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class ExpiredGamesQuery
{
    /**
     * @return Collection<int, Game>
     */
    public function getExpiredGames(): Collection
    {
        return Game::query()
            ->where('status', GameStatus::Playing)
            ->where('created_at', '<', Carbon::now()->subMinutes(20))
            ->get();
    }
}
