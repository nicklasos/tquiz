<?php

declare(strict_types=1);

namespace App\Queries\Trivia;

use App\Models\Question;

class GamePlayQuery
{
    public function question(int $gameSeedId, int $questionNumber): Question
    {
        return Question::query()
            ->with('answers')
            ->selectRaw('questions.*')
            ->leftJoin(
                'game_seed_questions',
                'game_seed_questions.question_id',
                '=',
                'questions.id'
            )
            ->where('game_seed_questions.game_seed_id', $gameSeedId)
            ->orderBy('game_seed_questions.id')
            ->limit(1)
            ->offset($questionNumber - 1)
            ->first();
    }
}
