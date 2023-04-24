<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Collection;

class TournamentsQuery
{
    /**
     * @return Collection<int, Tournament>
     */
    public function active(): Collection
    {
        return Tournament::query()
            ->active()
            ->comingSoon(false)
            ->get();
    }

    public function comingSoon(): Collection
    {
        return Tournament::query()
            ->comingSoon()
            ->get();
    }
}
