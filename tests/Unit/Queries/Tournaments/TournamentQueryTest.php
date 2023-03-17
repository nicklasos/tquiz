<?php

declare(strict_types=1);

namespace Tests\Unit\Queries\Tournaments;

use App\Models\GameSeed;
use App\Models\Question;
use App\Models\Theme;
use App\Models\Tournament;
use App\Queries\Tournaments\TournamentQuery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TournamentQueryTest extends TestCase
{
    use DatabaseTransactions;

    public function testBySeedId()
    {
        $theme = Theme::factory()->create();

        $tournament = Tournament::factory()
            ->hasAttached($theme)
            ->create(['questions' => 16]);

        $question = Question::factory()
            ->for($theme)
            ->create();

        $gameSeed = GameSeed::factory()
            ->for($tournament)
            ->create();

        $tournamentQuery = app(TournamentQuery::class);

        $foundTournament = $tournamentQuery->bySeedId($gameSeed->id);

        $this->assertTrue($foundTournament->is($tournament));
    }
}
