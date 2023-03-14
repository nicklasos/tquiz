<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Tournament;

class TournamentQuery
{
    public function bySeedId(int $seedId): Tournament
    {
        return Tournament::query()
            ->select('tournaments.*')
            ->leftJoin('game_seeds', 'game_seeds.tournament_id', '=', 'tournaments.id')
            ->where('game_seeds.id', $seedId)
            ->firstOrFail();
    }
}
