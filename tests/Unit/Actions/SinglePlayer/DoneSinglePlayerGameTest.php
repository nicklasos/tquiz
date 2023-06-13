<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\SinglePlayer;

use App\Actions\SinglePlayer\DoneSinglePlayerGame;
use App\Models\SinglePlayer\SinglePlayer;
use App\Models\SinglePlayer\SinglePlayerStatus;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DoneSinglePlayerGameTest extends TestCase
{
    use DatabaseTransactions;

    public function testDone()
    {
        /** @var SinglePlayer $singlePlayer */
        $singlePlayer = SinglePlayer::factory()->create();

        $this->assertEquals(SinglePlayerStatus::Playing, $singlePlayer->status);

        $done = app(DoneSinglePlayerGame::class);

        $done->done($singlePlayer);

        $this->assertEquals(SinglePlayerStatus::Done, $singlePlayer->status);
    }
}
