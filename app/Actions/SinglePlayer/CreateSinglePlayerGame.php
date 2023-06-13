<?php

declare(strict_types=1);

namespace App\Actions\SinglePlayer;

use App\Models\SinglePlayer\SinglePlayer;
use App\Models\SinglePlayer\SinglePlayerGameDto;
use App\Models\SinglePlayer\SinglePlayerStatus;
use App\Models\TempUser;
use App\Queries\ThemesQuery;
use App\Queries\Tournaments\QuestionsQuery;

class CreateSinglePlayerGame
{
    public function __construct(
        private readonly QuestionsQuery $questionsQuery,
        private readonly ThemesQuery    $themesQuery,
    )
    {
    }

    public function create(TempUser $tempUser): SinglePlayerGameDto
    {
        $themeIds = $this->themesQuery->byNames(...config('singleplayer.themes'));

        $questions = $this->questionsQuery->randomQuestions(
            $themeIds,
            config('singleplayer.questions'),
        );

        $singlePlayer = SinglePlayer::create([
            'temp_user_id' => $tempUser->id,
            'status' => SinglePlayerStatus::Playing,
            'question_ids' => $questions->pluck('id'),
        ]);

        return new SinglePlayerGameDto(
            $singlePlayer,
            $questions,
        );
    }
}
