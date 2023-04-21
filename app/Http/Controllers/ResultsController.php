<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Queries\Tournaments\HistoryQuery;
use App\Services\TempUsers\TempUserSession;

class ResultsController extends Controller
{
    public function __invoke(HistoryQuery $historyQuery, TempUserSession $tempUserStorage)
    {
        $games = $historyQuery->get($tempUserStorage->getModelWithId());

        return view('tournaments.results', compact('games'));
    }
}
