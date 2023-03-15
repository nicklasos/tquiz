<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Game;
use App\Models\TempUser;
use Illuminate\Database\Eloquent\Collection;

class HistoryQuery
{
    /**
     * @param TempUser $tempUser
     * @return Collection<int, Game>
     */
    public function get(TempUser $tempUser): Collection
    {
        return Game::query()
            ->with('tournament')
            ->where('temp_user_id', $tempUser->id)
            ->orderByDesc('id')
            ->limit(50)
            ->get();
    }
}
