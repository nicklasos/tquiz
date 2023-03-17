<?php

declare(strict_types=1);

namespace App\Actions\Trivia;

use App\Actions\Tournaments\AddScore;
use App\Models\Game;
use App\Models\GameQuestionAnswer;
use App\Models\TempUser;
use App\Queries\Trivia\QuestionAnswerQuery;

class AnswerQuestion
{
    public function __construct(
        private readonly QuestionAnswerQuery $questionAnswerQuery,
        private readonly AddScore            $addScore,
    )
    {
    }

    public function answer(
        TempUser $tempUser,
        int      $gameSeedId,
        int      $answerId,
        int      $seconds,
    ): GameQuestionAnswer
    {
        $questionAnswer = $this->questionAnswerQuery->find($answerId);

        if ($questionAnswer->is_correct) {

            $game = Game::query()
                ->where('temp_user_id', $tempUser->id)
                ->where('game_seed_id', $gameSeedId)->firstOrFail();

            $this->addScore->add($game, 10 + $seconds * 10);
        }

        return GameQuestionAnswer::create([
            'temp_user_id' => $tempUser->id,
            'game_seed_id' => $gameSeedId,
            'question_answer_id' => $answerId,
            'seconds' => $seconds,
        ]);
    }
}
