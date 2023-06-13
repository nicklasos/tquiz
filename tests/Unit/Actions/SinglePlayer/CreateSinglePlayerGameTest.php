<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\SinglePlayer;

use App\Actions\SinglePlayer\CreateSinglePlayerGame;
use App\Exceptions\SinglePlayer\NoQuestionsForSinglePlayerException;
use App\Models\Question;
use App\Models\SinglePlayer\SinglePlayer;
use App\Models\SinglePlayer\SinglePlayerGameDto;
use App\Models\TempUser;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreateSinglePlayerGameTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreate()
    {
        $tempUser = TempUser::factory()->create();

        $theme = Theme::factory()->create(['name' => 'TestQuestionsSinglePlayer']);

        $question = Question::factory()
            ->for($theme)
            ->create();

        $question2 = Question::factory()
            ->for($theme)
            ->create();

        $question3 = Question::factory()
            ->for($theme)
            ->create();

        config([
            'singleplayer' => [
                'questions' => 2,
                'themes' => ['TestQuestionsSinglePlayer'],
            ],
        ]);

        $singlePlayer = app(CreateSinglePlayerGame::class);

        $dto = $singlePlayer->create($tempUser);

        $this->assertCount(2, $dto->questions);
    }

    public function testNoQuestionsException()
    {
        $singlePlayer = SinglePlayer::factory()->create();

        $this->assertThrows(function () use ($singlePlayer) {

            new SinglePlayerGameDto($singlePlayer, new Collection());

        }, NoQuestionsForSinglePlayerException::class);
    }
}
