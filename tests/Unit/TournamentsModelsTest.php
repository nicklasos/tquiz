<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\Room;
use App\Models\RoomUser;
use App\Models\Theme;
use App\Models\Tournament;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TournamentsModelsTest extends TestCase
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

    public function testThemesModels()
    {
        $theme = Theme::factory()->create();

        $tournament = Tournament::factory()->create();

        $tournament->themes()->save($theme);

        $this->assertTrue($tournament->themes->last()->is($theme));

        $question = Question::factory()
            ->for($theme)
            ->create();

        $this->assertTrue($question->theme->is($theme));
    }
}
