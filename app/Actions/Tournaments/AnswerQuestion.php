<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Actions\Tournaments\AddScore;
use App\Models\Game;
use App\Models\GameQuestionAnswer;
use App\Queries\Tournaments\QuestionAnswerQuery;

class AnswerQuestion
{
    public function __construct(
        private readonly QuestionAnswerQuery $questionAnswerQuery,
        private readonly AddScore            $addScore,
    )
    {
    }

    public function answer(
        Game     $game,
        int      $answerId,
        int      $seconds,
    ): GameQuestionAnswer
    {
        $questionAnswer = $this->questionAnswerQuery->find($answerId);

        if ($questionAnswer->is_correct) {
            $this->addScore->add($game, 10 + $seconds * 10);
        }

        return GameQuestionAnswer::create([
            'temp_user_id' => $game->temp_user_id,
            'game_seed_id' => $game->game_seed_id,
            'question_answer_id' => $answerId,
            'seconds' => $seconds,
        ]);
    }
}
