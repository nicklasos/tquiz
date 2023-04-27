<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Game;
use App\Models\GameStatus;
use App\Models\TempUser;
use Illuminate\Database\Eloquent\Collection;

class HistoryQuery
{
    /**
     * @param TempUser $tempUser
     * @param array<GameStatus> $statuses
     * @return Collection<int, Game>
     */
    public function get(TempUser $tempUser, array $statuses): Collection
    {
        return Game::query()
            ->with('tournament')
            ->where('temp_user_id', $tempUser->id)
            ->whereIn('status', $statuses)
            ->orderByDesc('id')
            ->limit(30)
            ->get();
    }
}
