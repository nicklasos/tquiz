<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class LeaderboardController extends Controller
{
    public function __invoke()
    {
        return view('components.leaderboard');
    }
}
