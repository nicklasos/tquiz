<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Queries\Tournaments\Cached\ActiveTournamentsCachedQuery;

class HomeController extends Controller
{
    public function __invoke(ActiveTournamentsCachedQuery $activeTournamentsQuery)
    {
        $tournaments = $activeTournamentsQuery->get();

        return view('home', compact('tournaments'));
    }
}
