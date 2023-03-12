<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\GameSeed;
use App\Models\Tournament;

class MaxGameSeedsQuery
{
    public function isMaxSeedsForTournament(Tournament $tournament): bool
    {
        return GameSeed::query()
                ->where('tournament_id', $tournament->id)
                ->count() > GameSeed::MAX_SEEDS_FOR_TOURNAMENT;
    }
}
