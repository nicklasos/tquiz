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
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AnswerQuestionTest extends TestCase
{
    use DatabaseTransactions;

    public function testAnswer()
    {
        $theme = Theme::factory()->create();

        $tournament = Tournament::factory()
            ->hasAttached($theme)
            ->create();

        $question = Question::factory()->for($theme)->create();
        $answer = QuestionAnswer::factory()->for($question)->create();

        $gameSeed = GameSeed::factory()->for($tournament)->create();

        $gameSeedQuestion = GameSeedQuestion::factory()
            ->for($gameSeed)
            ->for($question)
            ->create();


        $tempUser = TempUser::factory()->create();

        $game = Game::factory()
            ->for($tournament)
            ->for($gameSeed)
            ->for($tempUser)
            ->create();

        $answerQuestion = app(AnswerQuestion::class);

        $gameQuestionAnswer = $answerQuestion->answer($tempUser, $game, $answer);

        $this->assertEquals($game->id, $gameQuestionAnswer->game_id);
    }
}
