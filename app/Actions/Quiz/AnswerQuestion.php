<?php

declare(strict_types=1);

namespace App\Actions\Quiz;

use App\Models\Game;
use App\Models\GameQuestionAnswer;
use App\Models\QuestionAnswer;
use App\Models\TempUser;

class AnswerQuestion
{
    public function answer(
        TempUser       $tempUser,
        Game           $game,
        QuestionAnswer $questionAnswer
    ): GameQuestionAnswer
    {
        return GameQuestionAnswer::create([
            'temp_user_id' => $tempUser->id,
            'game_id' => $game->id,
            'question_answer_id' => $questionAnswer->id,
            'seconds' => 0,
        ]);
    }
}
