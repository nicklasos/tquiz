<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameQuestionAnswer;
use App\Models\Question;

class GamePlayQuery
{
    public function question(Game $game, int $questionNumber): Question
    {
        $question = Question::query()
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

        $question->setRelation(
            'answers',
            $question->answers->shuffle($question->id) // equality for every player
        );

        return $question;
    }

    public function isAlreadyPlaying(Game $game): bool
    {
        return !!GameQuestionAnswer::query()
            ->where('game_id', $game->id)
            ->where('temp_user_id', $game->temp_user_id)
            ->limit(1)
            ->count();
    }
}
