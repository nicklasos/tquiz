<?php

declare(strict_types=1);

namespace App\Actions\Trivia;

use App\Models\Game;
use App\Models\GameQuestionAnswer;
use App\Models\QuestionAnswer;
use App\Models\TempUser;

class AnswerQuestion
{
    public function answer(
        TempUser $tempUser,
        int      $gameSeedId,
        int      $answerId,
    ): GameQuestionAnswer
    {
        return GameQuestionAnswer::create([
            'temp_user_id' => $tempUser->id,
            'game_seed_id' => $gameSeedId,
            'question_answer_id' => $answerId,
            'seconds' => 0,
        ]);
    }
}
