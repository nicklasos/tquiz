<?php

declare(strict_types=1);

namespace App\Services\Trivia;

use Carbon\Carbon;

class AnswerTimingSession
{
    public function set(int $gameSeedId): void
    {
        session(["question:{$gameSeedId}" => Carbon::now()->toDateTimeString()]);
    }

    public function getSeconds(int $gameSeedId): int
    {
        $date = session("question:{$gameSeedId}");

        $diff = Carbon::now()->diffInSeconds(Carbon::parse($date));

        session()->remove("question:{$gameSeedId}");

        return $diff + 1; // add "internet" second
    }
}
