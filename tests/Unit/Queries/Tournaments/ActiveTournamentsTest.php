<?php

declare(strict_types=1);

namespace Tests\Unit\Queries\Tournaments;

use App\Models\Tournament;
use App\Queries\Tournaments\Cached\TournamentsCachedQuery;
use App\Queries\Tournaments\TournamentsQuery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ActiveTournamentsTest extends TestCase
{
    use DatabaseTransactions;

    public function testGet()
    {
        $tournament = Tournament::factory()->create();

        $activeTournaments = app(TournamentsQuery::class);

        $this->assertTrue($tournament->is($activeTournaments->active()->last()));

        $activeTournamentsCached = app(TournamentsCachedQuery::class);

        $this->assertTrue($tournament->is($activeTournamentsCached->active()->last()));
    }
}
