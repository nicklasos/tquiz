<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Actions\Tournaments\JoinTournament;
use App\Http\Controllers\Controller;
use App\Models\Tournament;
use App\Services\TempUsers\TempUserSession;

class JoinTournamentController extends Controller
{
    public function __invoke(
        Tournament      $tournament,
        TempUserSession $tempUserStorage,
        JoinTournament  $joinTournament
    )
    {
        $game = $joinTournament->join(
            $tempUserStorage->getModelWithId(),
            $tournament,
        );

        return to_route('tournament.play', $game);
    }
}
