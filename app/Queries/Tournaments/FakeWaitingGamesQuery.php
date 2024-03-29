<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameStatus;
use Illuminate\Database\Eloquent\Collection;

class FakeWaitingGamesQuery
{
    /**
     * @return Collection<int, Game>
     */
    public function get(): Collection
    {
        return Game::query()
            ->with('leaderboards')
            ->where('status', GameStatus::WaitingFakeParticipants)
            ->get();
    }
}
