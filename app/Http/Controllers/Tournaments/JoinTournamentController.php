<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Actions\Tournaments\JoinTournament;
use App\Facades\TempUserSession;
use App\Http\Controllers\Controller;
use App\Models\Tournament;
use Gate;

class JoinTournamentController extends Controller
{
    public function __invoke(
        Tournament      $tournament,
        JoinTournament  $joinTournament
    )
    {
        Gate::authorize('can-join-tournament', $tournament);

        $game = $joinTournament->join(
            TempUserSession::getModelWithId(),
            $tournament,
        );

        return to_route('tournament.play', $game);
    }
}
