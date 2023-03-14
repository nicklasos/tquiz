<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Actions\Tournaments\JoinTournament;
use App\Http\Controllers\Controller;
use App\Models\Tournament;
use App\Services\TempUsers\TempUserStorage;

class JoinTournamentController extends Controller
{
    public function __invoke(
        Tournament      $tournament,
        TempUserStorage $tempUserStorage,
        JoinTournament  $joinTournament
    )
    {
        $game = $joinTournament->join(
            $tempUserStorage->getModelWithId(),
            $tournament,
        );

        return to_route('tournament.play', $game->game_seed_id);
    }
}
