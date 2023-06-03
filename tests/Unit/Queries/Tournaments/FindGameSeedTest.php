<?php

declare(strict_types=1);

namespace Tests\Unit\Queries\Tournaments;

use App\Models\Tournaments\GameSeed;
use App\Models\TempUser;
use App\Models\Tournaments\Tournament;
use App\Queries\Tournaments\FindGameSeedQuery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class FindGameSeedTest extends TestCase
{
    use DatabaseTransactions;

    public function testForUser()
    {
        $findGameSeed = app(FindGameSeedQuery::class);

        $tempUser = TempUser::factory()->create();
        $tournament = Tournament::factory()->create();

        $this->assertNull($findGameSeed->forUser($tempUser, $tournament));

        $seed = GameSeed::factory()
            ->for($tournament)
            ->create();

        $seedFromQuery = $findGameSeed->forUser($tempUser, $tournament);

        $this->assertTrue($seedFromQuery->is($seed));
    }
}
