<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameQuestionAnswer;
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
            $this->addScore->add($game, 100 + $seconds * 15);
        }

        return GameQuestionAnswer::create([
            'temp_user_id' => $game->temp_user_id,
            'game_id' => $game->id,
            'game_seed_id' => $game->game_seed_id,
            'question_answer_id' => $answerId,
            'seconds' => $seconds,
        ]);
    }
}
