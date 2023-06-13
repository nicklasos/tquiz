<?php

declare(strict_types=1);

namespace App\Queries\Tournaments\Cached;

use App\Models\Tournaments\Tournament;
use App\Queries\Tournaments\TournamentThemesQuery;
use Illuminate\Support\Facades\Cache;

class ThemesCachedQuery
{
    public function __construct(private readonly TournamentThemesQuery $query)
    {
    }

    public function idsForTournament(Tournament $tournament): array
    {
        return Cache::remember(
            "tournament:{$tournament->id}:theme:ids",
            60 * 5,
            fn() => $this->query->idsForTournament($tournament),
        );
    }
}
