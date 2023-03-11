<?php

declare(strict_types=1);

namespace Tests\Unit\Queries;

use App\Models\Tournament;
use App\Queries\ActiveTournamentsCachedQuery;
use App\Queries\ActiveTournamentsQuery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ActiveTournamentsTest extends TestCase
{
    use DatabaseTransactions;

    public function testGet()
    {
        $tournament = Tournament::factory()->create();

        $activeTournaments = app(ActiveTournamentsQuery::class);

        $this->assertEquals(
            $tournament->id,
            $activeTournaments->get()->last()->id,
        );

        $activeTournamentsCached = app(ActiveTournamentsCachedQuery::class);

        $this->assertEquals(
            $tournament->id,
            $activeTournamentsCached->get()->last()->id,
        );
    }
}
