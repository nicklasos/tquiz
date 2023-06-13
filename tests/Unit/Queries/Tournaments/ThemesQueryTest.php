<?php

declare(strict_types=1);

namespace Tests\Unit\Queries\Tournaments;

use App\Models\Theme;
use App\Models\Tournaments\Tournament;
use App\Queries\Tournaments\Cached\ThemesCachedQuery;
use App\Queries\Tournaments\TournamentThemesQuery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ThemesQueryTest extends TestCase
{
    use DatabaseTransactions;

    public function testIdsForTournament()
    {
        $themes = Theme::factory()
            ->count(3)
            ->create();

        $tournament = Tournament::factory()
            ->hasAttached($themes)
            ->create();

        $query = app(TournamentThemesQuery::class);

        $ids = $query->idsForTournament($tournament);

        $this->assertEquals($themes[0]->id, $ids[0]);
        $this->assertEquals($themes[1]->id, $ids[1]);
        $this->assertEquals($themes[2]->id, $ids[2]);

        $cached = app(ThemesCachedQuery::class);

        $ids = $cached->idsForTournament($tournament);

        $this->assertEquals($themes[0]->id, $ids[0]);
        $this->assertEquals($themes[1]->id, $ids[1]);
        $this->assertEquals($themes[2]->id, $ids[2]);
    }
}
