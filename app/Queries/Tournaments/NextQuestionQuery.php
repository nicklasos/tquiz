<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameQuestionAnswer;

class NextQuestionQuery
{
    public function get(Game $game): NextQuestionDto
    {
        $answersCount = GameQuestionAnswer::query()
            ->where('temp_user_id', $game->temp_user_id)
            ->where('game_id', $game->id)
            ->count();

        $max = $game->tournament->questions;

        if ($answersCount >= $max) {
            return new NextQuestionDto(null, null);
        }

        return new NextQuestionDto(
            $answersCount + 1,
             $answersCount + 1 >= $max,
        );
    }
}
