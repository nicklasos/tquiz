<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Queries\Tournaments\HistoryQuery;
use App\Services\TempUsers\TempUserStorage;

class HistoryController extends Controller
{
    public function __invoke(HistoryQuery $historyQuery, TempUserStorage $tempUserStorage)
    {
        $games = $historyQuery->get($tempUserStorage->getModelWithId());

        return view('tournaments.history', compact('games'));
    }
}
