<?php

declare(strict_types=1);

namespace Tests\Unit\Queries\Tournaments;

use App\Models\Tournament;
use App\Queries\Tournaments\Cached\ActiveTournamentsCachedQuery;
use App\Queries\Tournaments\ActiveTournamentsQuery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ActiveTournamentsTest extends TestCase
{
    use DatabaseTransactions;

    public function testGet()
    {
        $tournament = Tournament::factory()->create();

        $activeTournaments = app(ActiveTournamentsQuery::class);

        $this->assertTrue($tournament->is($activeTournaments->get()->last()));

        $activeTournamentsCached = app(ActiveTournamentsCachedQuery::class);

        $this->assertTrue($tournament->is($activeTournamentsCached->get()->last()));
    }
}
