<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameStatus;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CloseExpiredGamesCommandTest extends TestCase
{
    use DatabaseTransactions;

    public function testHandle()
    {
        $game = Game::factory()->create([
            'tournament_id' => 1,
            'game_seed_id' => 1,
            'temp_user_id' => 1,
            'created_at' => Carbon::now()->subMinutes(25),
        ]);

        $gamePlaying = Game::factory()->create([
            'tournament_id' => 1,
            'game_seed_id' => 1,
            'temp_user_id' => 1,
            'created_at' => Carbon::now()->subMinutes(5),
        ]);

        $gameWaiting = Game::factory()->create([
            'tournament_id' => 1,
            'game_seed_id' => 1,
            'temp_user_id' => 1,
            'status' => GameStatus::WaitingParticipants,
            'created_at' => Carbon::now()->subMinutes(25),
        ]);

        $this->assertEquals(GameStatus::Playing, $game->status);
        $this->assertEquals(GameStatus::WaitingParticipants, $gameWaiting->status);

        $this->artisan('expired-games:close')->assertOk();

        $game->refresh();
        $gameWaiting->refresh();
        $gamePlaying->refresh();

        $this->assertEquals(GameStatus::Expired, $game->status);
        $this->assertEquals(GameStatus::WaitingParticipants, $gameWaiting->status);
        $this->assertEquals(GameStatus::Playing, $gamePlaying->status);
    }
}
