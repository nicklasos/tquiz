<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Queries\Tournaments\Cached\ActiveTournamentsCachedQuery;
use App\Services\Seo\MainPageSeo;

class HomeController extends Controller
{
    public function __invoke(
        ActiveTournamentsCachedQuery $activeTournamentsQuery,
        MainPageSeo $seo,
    )
    {
        $tournaments = $activeTournamentsQuery->get();

        $seo->fill();

        return view('home', compact('tournaments'));
    }
}
