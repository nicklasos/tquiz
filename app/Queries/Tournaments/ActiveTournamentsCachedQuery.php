<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Queries\Tournaments\ActiveTournamentsQuery;
use Illuminate\Support\Facades\Cache;

class ActiveTournamentsCachedQuery
{
    public function __construct(private readonly ActiveTournamentsQuery $query)
    {
    }

    public function get()
    {
        return Cache::remember('query:active-tournaments', 60 * 5, function () {
            return $this->query->get();
        });
    }
}
