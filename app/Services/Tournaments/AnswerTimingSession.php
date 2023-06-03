<?php

declare(strict_types=1);

namespace App\Services\Tournaments;

use App\Models\Tournaments\Game;
use Carbon\Carbon;

class AnswerTimingSession
{
    public function set(Game $game): void
    {
        session(["question:{$game->id}" => Carbon::now()->toDateTimeString()]);
    }

    public function getSeconds(Game $game): int
    {
        $date = session("question:{$game->id}");

        $diff = Carbon::now()->diffInSeconds(Carbon::parse($date));

        session()->remove("question:{$game->id}");

        return $diff
            ? $diff + 1 // add "internet" second
            : 0;
    }
}
