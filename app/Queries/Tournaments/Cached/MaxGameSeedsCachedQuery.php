<?php

declare(strict_types=1);

namespace App\Queries\Tournaments\Cached;

use App\Models\Tournament;
use App\Queries\Tournaments\MaxGameSeedsQuery;
use Illuminate\Support\Facades\Cache;

class MaxGameSeedsCachedQuery
{
    public function __construct(private readonly MaxGameSeedsQuery $query)
    {
    }

    public function isMaxSeedsForTournament(Tournament $tournament): bool
    {
        return Cache::remember(
            "query:tournament:{$tournament->id}:seeds",
            60 * 1,
            fn() => $this->query->isMaxSeedsForTournament($tournament),
        );
    }
}
