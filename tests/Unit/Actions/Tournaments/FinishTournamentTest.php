<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\Tournaments;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class FinishTournamentTest extends TestCase
{
    use DatabaseTransactions;

    public function testFinish()
    {
        $this->assertTrue(true);
    }
}
