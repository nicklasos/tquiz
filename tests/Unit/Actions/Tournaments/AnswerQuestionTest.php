<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\Tournaments;

use App\Actions\Tournaments\AnswerQuestion;
use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameSeed;
use App\Models\Tournaments\GameSeedQuestion;
use App\Models\Question;
use App\Models\Tournaments\QuestionAnswer;
use App\Models\TempUser;
use App\Models\Theme;
use App\Models\Tournaments\Tournament;
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
        $answer = QuestionAnswer::factory()
            ->correct()
            ->for($question)
            ->create();

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
            ->create(['score' => 3]);

        $answerQuestion = app(AnswerQuestion::class);

        $gameQuestionAnswer = $answerQuestion->answer(
            $game,
            $answer->id,
            4,
        );

        $this->assertEquals($gameSeed->id, $gameQuestionAnswer->game_seed_id);
    }
}
