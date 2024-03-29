<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Http\Controllers\Controller;
use App\Models\Tournaments\Game;
use App\Services\Tournaments\LeaderboardService;
use Gate;
use Illuminate\Support\Sleep;

class LeaderboardController extends Controller
{
    public function __invoke(Game $game, LeaderboardService $leaderboard)
    {
        Gate::authorize('can-view-result', $game);

        $leaderboards = $leaderboard->getByGame($game);

        return view('components.leaderboard', compact(
            'game',
            'leaderboards',
        ));
    }
}
