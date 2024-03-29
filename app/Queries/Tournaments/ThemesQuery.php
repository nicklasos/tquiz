<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Tournaments\Tournament;

class ThemesQuery
{
    public function idsForTournament(Tournament $tournament): array
    {
        return $tournament
            ->themes()
            ->pluck('themes.id')
            ->toArray();
    }
}
