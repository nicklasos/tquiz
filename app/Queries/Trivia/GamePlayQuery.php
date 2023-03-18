<?php

declare(strict_types=1);

namespace App\Queries\Trivia;

use App\Models\Game;
use App\Models\GameQuestionAnswer;
use App\Models\Question;
use App\Models\TempUser;

class GamePlayQuery
{
    public function question(Game $game, int $questionNumber): Question
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
            ->where('game_seed_questions.game_seed_id', $game->game_seed_id)
            ->orderBy('game_seed_questions.id')
            ->limit(1)
            ->offset($questionNumber - 1)
            ->first();
    }

    public function isAlreadyPlaying(Game $game): bool
    {
        return !!GameQuestionAnswer::query()
            ->where('game_seed_id', $game->game_seed_id)
            ->where('temp_user_id', $game->temp_user_id)
            ->limit(1)
            ->count();
    }
}
