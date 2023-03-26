<?php

declare(strict_types=1);

namespace Tests\Unit\Queries\Tournaments;

use App\Models\Game;
use App\Models\GameSeed;
use App\Models\GameSeedQuestion;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\TempUser;
use App\Models\Theme;
use App\Models\Tournament;
use App\Queries\Tournaments\GamePlayQuery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class GamePlayQueryTest extends TestCase
{
    use DatabaseTransactions;

    public function testQuestion()
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

        $answer2 = QuestionAnswer::factory()
            ->for($question)
            ->create();

        $answer3 = QuestionAnswer::factory()
            ->for($question)
            ->create();

        $gameSeed = GameSeed::factory()
            ->for($tournament)
            ->create();

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


        $gamePlay = app(GamePlayQuery::class);

        $q = $gamePlay->question($game, 1);

        $this->assertEquals(3, $q->answers->count());
    }
}
