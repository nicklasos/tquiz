<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\Trivia;

use App\Actions\Trivia\AnswerQuestion;
use App\Models\Game;
use App\Models\GameSeed;
use App\Models\GameSeedQuestion;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\TempUser;
use App\Models\Theme;
use App\Models\Tournament;
use App\Queries\Trivia\NextQuestionQuery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class NextQuestionTest extends TestCase
{
    use DatabaseTransactions;

    public function testNumber()
    {
        $theme = Theme::factory()->create();

        $tournament = Tournament::factory()
            ->hasAttached($theme)
            ->create([
                'questions' => 2,
            ]);

        $question = Question::factory()
            ->for($theme)
            ->create();

        $answer = QuestionAnswer::factory()
            ->for($question)
            ->create();

        $question2 = Question::factory()
            ->for($theme)
            ->create();

        $answer2 = QuestionAnswer::factory()
            ->for($question2)
            ->create();


        $gameSeed = GameSeed::factory()
            ->for($tournament)
            ->create();

        $gameSeedQuestion = GameSeedQuestion::factory()
            ->for($gameSeed)
            ->for($question)
            ->create();

        $gameSeedQuestion2 = GameSeedQuestion::factory()
            ->for($gameSeed)
            ->for($question2)
            ->create();

        $tempUser = TempUser::factory()->create();

        $game = Game::factory()
            ->for($tournament)
            ->for($gameSeed)
            ->for($tempUser)
            ->create();

        $answerAction = app(AnswerQuestion::class);
        $nextQuestion = app(NextQuestionQuery::class);

        $this->assertEquals(1, $nextQuestion->number(
            $tempUser, $gameSeed->id
        ));

        $answerAction->answer($tempUser, $gameSeed->id, $answer->id, 1);

        $this->assertEquals(2, $nextQuestion->number(
            $tempUser, $gameSeed->id
        ));

        $answerAction->answer($tempUser, $gameSeed->id, $answer->id, 1);

        $this->assertNull($nextQuestion->number(
            $tempUser, $gameSeed->id
        ));
    }
}
