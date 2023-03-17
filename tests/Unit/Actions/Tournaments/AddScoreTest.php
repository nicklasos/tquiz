<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\Tournaments;

use App\Actions\Tournaments\AddScore;
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

class AddScoreTest extends TestCase
{
    use DatabaseTransactions;

    public function testAdd()
    {
        $add = app(AddScore::class);

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

        $add->add($game, 34);

        $this->assertEquals(37, $game->score);
    }
}
