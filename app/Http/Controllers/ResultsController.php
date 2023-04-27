<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Facades\TempUserSession;
use App\Models\GameStatus;
use App\Queries\Tournaments\HistoryQuery;

class ResultsController extends Controller
{
    public function __invoke(HistoryQuery $historyQuery)
    {
        $completedGames = $historyQuery->get(
            TempUserSession::getModelWithId(),
            [
                GameStatus::Done,
            ]
        );

        $waitingGames = $historyQuery->get(
            TempUserSession::getModelWithId(),
            [
                GameStatus::WaitingParticipants,
                GameStatus::WaitingFakeParticipants,
            ]
        );

        return view('tournaments.results', compact(
            'completedGames',
            'waitingGames',
        ));
    }
}
