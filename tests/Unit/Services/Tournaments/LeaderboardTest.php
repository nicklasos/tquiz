<?php

declare(strict_types=1);

namespace Tests\Unit\Services\Tournaments;

use App\Models\Game;
use App\Models\GameSeed;
use App\Models\GameStatus;
use App\Models\LeaderboardStatus;
use App\Models\TempUser;
use App\Models\Tournament;
use App\Services\Tournaments\LeaderboardService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LeaderboardTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetByGame()
    {
        $tournament = Tournament::factory()->create([
            'players' => 3,
        ]);

        $gameSeed = GameSeed::factory()
            ->for($tournament)
            ->create();

        $mainUser = TempUser::factory()->create();
        $secondUser = TempUser::factory()->create();
        $thirdUser = TempUser::factory()->create();

        $game = Game::factory()
            ->for($gameSeed)
            ->for($tournament)
            ->for($mainUser)
            ->create([
                'status' => GameStatus::WaitingFakeParticipants,
            ]);

        \App\Models\Leaderboard::factory()->create([
            'is_main_user' => true,
            'status' => 'done',
            'score' => 120,
            'place' => 2,
            'temp_user_id' => $mainUser->id,
            'game_id' => $game->id,
        ]);

        \App\Models\Leaderboard::factory()->create([
            'status' => 'playing',
            'is_main_user' => false,
            'score' => 150,
            'place' => 1,
            'temp_user_id' => $secondUser->id,
            'game_id' => $game->id,
        ]);

        \App\Models\Leaderboard::factory()->create([
            'status' => 'done',
            'is_main_user' => false,
            'score' => 100,
            'place' => 3,
            'temp_user_id' => $thirdUser->id,
            'game_id' => $game->id,
        ]);

        $leaderboard = app(LeaderboardService::class)->getByGame($game);

        $this->assertEquals(120, $leaderboard[0]->score);
        $this->assertEquals(1, $leaderboard[0]->place);

        $this->assertEquals(100, $leaderboard[1]->score);
        $this->assertEquals(2, $leaderboard[1]->place);

        $this->assertEquals(150, $leaderboard[2]->score);
        $this->assertEquals(3, $leaderboard[2]->place);
        $this->assertEquals(LeaderboardStatus::Playing, $leaderboard[2]->status);
    }
}
