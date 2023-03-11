<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\Tournament;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ModelsTest extends TestCase
{
    use DatabaseTransactions;

    public function testTournamentsModels()
    {
        $tournament = Tournament::factory()->create();

        $question = Question::factory()
            ->for($tournament)
            ->create();

        $wrongAnswers = QuestionAnswer::factory()
            ->for($question)
            ->count(3)
            ->create();

        $correctAnswer = QuestionAnswer::factory()
            ->for($question)
            ->correct()
            ->create();

        $this->assertTrue(true);
    }
}
