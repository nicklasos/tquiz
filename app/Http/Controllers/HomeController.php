<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Queries\Tournaments\Cached\TournamentsCachedQuery;
use App\Services\Seo\MainPageSeo;

class HomeController extends Controller
{
    public function __invoke(
        TournamentsCachedQuery $tournamentsQuery,
        MainPageSeo            $seo,
    )
    {
        $tournaments = $tournamentsQuery->active();
        $comingSoon = $tournamentsQuery->comingSoon();

        $seo->fill();

        return view('home', compact('tournaments', 'comingSoon'));
    }
}
