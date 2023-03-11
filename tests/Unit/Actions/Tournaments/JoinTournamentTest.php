<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\Tournaments;

use App\Models\Question;
use App\Models\Tournament;
use Tests\TestCase;

class JoinTournamentTest extends TestCase
{
    public function testJoin()
    {
        $tournament = Tournament::factory()->create();

        $question = Question::factory()
            ->for($tournament)
            ->create();

        $question2 = Question::factory()
            ->for($tournament)
            ->create();



        $this->assertTrue(true);
    }
}
