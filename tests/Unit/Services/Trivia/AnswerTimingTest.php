<?php

declare(strict_types=1);

namespace Tests\Unit\Services\Trivia;

use App\Models\Game;
use App\Services\Tournaments\AnswerTimingSession;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AnswerTimingTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetSet()
    {
        $timing = app(AnswerTimingSession::class);

        $game = new Game();
        $game->id = 1;

        $timing->set($game);

        Carbon::setTestNow(Carbon::now()->addSeconds(2));

        $seconds = $timing->getSeconds($game);

        $this->assertEquals(3, $seconds);

        $seconds = $timing->getSeconds($game);

        $this->assertEquals(0, $seconds);
    }
}
