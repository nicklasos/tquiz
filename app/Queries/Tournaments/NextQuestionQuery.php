<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Game;
use App\Models\GameQuestionAnswer;

class NextQuestionQuery
{
    public function number(Game $game): ?int
    {
        $answersCount = GameQuestionAnswer::query()
            ->where('temp_user_id', $game->temp_user_id)
            ->where('game_id', $game->id)
            ->count();

        $max = $game->tournament->questions;

        if ($answersCount >= $max) {
            return null;
        }

        return $answersCount + 1;
    }
}
