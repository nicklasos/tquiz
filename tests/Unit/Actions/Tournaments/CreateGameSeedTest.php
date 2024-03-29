<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\Tournaments;

use App\Actions\Tournaments\CreateGameSeed;
use App\Models\Question;
use App\Models\Tournaments\QuestionAnswer;
use App\Models\Theme;
use App\Models\Tournaments\Tournament;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreateGameSeedTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreate()
    {
        $createGameSeed = app(CreateGameSeed::class);

        $theme = Theme::factory()->create();

        $tournament = Tournament::factory()
            ->hasAttached($theme)
            ->create([
                'questions' => 3,
            ]);

        $questions = collect();

        for ($i = 0; $i < 5; $i++) {
            $question = Question::factory()
                ->for($theme)
                ->create();

            $questions[] = $question;

            QuestionAnswer::factory()
                ->for($question)
                ->count(3)
                ->create();

            QuestionAnswer::factory()
                ->for($question)
                ->correct()
                ->create();
        }

        $seed = $createGameSeed->createForQuestions($tournament, $questions->slice(0, 3));

        $this->assertEquals(
            $tournament->questions,
            $seed->gameSeedQuestions()->count(),
        );
    }
}
