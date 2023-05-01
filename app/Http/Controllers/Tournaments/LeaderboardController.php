<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Gate;

class LeaderboardController extends Controller
{
    public function __invoke(Game $game)
    {
        Gate::authorize('can-view-result', $game);

        return view('components.leaderboard');
    }
}
