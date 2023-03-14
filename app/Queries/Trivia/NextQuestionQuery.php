<?php

declare(strict_types=1);

namespace App\Queries\Trivia;

use App\Models\GameQuestionAnswer;
use App\Models\TempUser;
use App\Queries\Tournaments\TournamentQuery;

class NextQuestionQuery
{
    public function __construct(private readonly TournamentQuery $tournamentQuery)
    {
    }

    public function number(TempUser $tempUser, int $gameSeedId): ?int
    {
        $answersCount = GameQuestionAnswer::query()
            ->where('temp_user_id', $tempUser->id)
            ->where('game_seed_id', $gameSeedId)
            ->count();

        $max = $this->tournamentQuery->bySeedId($gameSeedId)->questions;

        if ($answersCount >= $max) {
            return null;
        }

        return $answersCount + 1;
    }
}
