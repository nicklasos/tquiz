<?php

declare(strict_types=1);

namespace App\Queries\Tournaments\Cached;

use App\Queries\Tournaments\TournamentsQuery;
use Illuminate\Support\Facades\Cache;

class TournamentsCachedQuery
{
    public function __construct(private readonly TournamentsQuery $query)
    {
    }

    public function active()
    {
        return Cache::remember(
            'query:active-tournaments',
            60 * 5,
            fn() => $this->query->active(),
        );
    }

    public function comingSoon()
    {
        return Cache::remember(
            'query:coming-soon-tournaments',
            60 * 5,
            fn() => $this->query->comingSoon(),
        );
    }
}
