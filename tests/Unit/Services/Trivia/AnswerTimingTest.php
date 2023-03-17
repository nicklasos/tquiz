<?php

declare(strict_types=1);

namespace Tests\Unit\Services\Trivia;

use App\Services\Trivia\AnswerTimingSession;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AnswerTimingTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetSet()
    {
        $timing = app(AnswerTimingSession::class);

        $timing->set(1, 1);

        sleep(2);

        $seconds = $timing->getSeconds(1);

        $this->assertEquals(2, $seconds);

        $seconds = $timing->getSeconds(1);

        $this->assertEquals(0, $seconds);
    }
}
