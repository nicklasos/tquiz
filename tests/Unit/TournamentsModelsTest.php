<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Game;
use App\Models\GameQuestionAnswer;
use App\Models\GameSeed;
use App\Models\GameSeedQuestion;
use App\Models\GameStatus;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\TempUser;
use App\Models\Theme;
use App\Models\Tournament;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TournamentsModelsTest extends TestCase
{
    use DatabaseTransactions;

    public function testTournamentsModels()
    {
        $theme = Theme::factory()->create();

        $tournament = Tournament::factory()
            ->hasAttached($theme)
            ->create();

        $question = Question::factory()->for($theme)->create();

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

    public function testGameQuestions()
    {
        $tempUser = TempUser::factory()->create();

        $theme = Theme::factory()->create();

        $tournament = Tournament::factory()
            ->hasAttached($theme)
            ->create();

        $question = Question::factory()->for($theme)->create();
        $answer = QuestionAnswer::factory()->for($question)->create();

        $question2 = Question::factory()->for($theme)->create();
        $answer2 = QuestionAnswer::factory()->for($question2)->correct()->create();


        $gameSeed = GameSeed::factory()->for($tournament)->create();

        $gameSeedQuestion = GameSeedQuestion::factory()
            ->for($gameSeed)
            ->for($question)
            ->create();

        $gameSeedQuestion2 = GameSeedQuestion::factory()
            ->for($gameSeed)
            ->for($question2)
            ->create();


        $game = Game::factory()
            ->for($tempUser)
            ->for($tournament)
            ->for($gameSeed)
            ->create();


        $gameQuestionAnswer = GameQuestionAnswer::factory()
            ->for($tempUser)
            ->for($game)
            ->for($gameSeed)
            ->for($answer)
            ->create(['seconds' => 2]);

        $gameQuestionAnswer2 = GameQuestionAnswer::factory()
            ->for($tempUser)
            ->for($game)
            ->for($gameSeed)
            ->for($answer2)
            ->create(['seconds' => 1]);



//        $answers = $game->gameSeed->gameAnswers;
//        dd($answers);
//        $this->assertInstanceOf(Carbon::class, $answers[0]->pivot->created_at);
        $this->assertTrue(true);
    }

    public function testGameEnum()
    {
        $tournament = Tournament::factory()->create();

        $tempUser = TempUser::factory()->create();

        $seed = GameSeed::factory()
            ->for($tournament)
            ->create();

        $game = Game::factory()
            ->for($tournament)
            ->for($seed)
            ->for($tempUser)
            ->create();

        $this->assertEquals(GameStatus::Playing, $game->status);
    }
}
