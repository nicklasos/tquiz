<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Collection;

class ActiveTournamentsQuery
{
    /**
     * @return Collection<int, Tournament>
     */
    public function get(): Collection
    {
        return Tournament::query()
            ->active()
            ->comingSoon(false)
            ->get();
    }
}
