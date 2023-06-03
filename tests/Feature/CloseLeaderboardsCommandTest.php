<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameStatus;
use App\Models\Tournaments\Leaderboard;
use App\Models\Tournaments\LeaderboardStatus;
use App\Models\TempUser;
use App\Services\Tournaments\RandomLeaderboardStatus;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery\MockInterface;
use Tests\TestCase;

class CloseLeaderboardsCommandTest extends TestCase
{
    use DatabaseTransactions;

    public function testHandle()
    {
        $game = Game::factory()->create([
            'tournament_id' => 1,
            'game_seed_id' => 1,
            'temp_user_id' => 1,
            'status' => GameStatus::WaitingFakeParticipants,
            'created_at' => Carbon::now()->subMinutes(5),
        ]);

        $user1 = TempUser::factory()->create();
        $user2 = TempUser::factory()->create();
        $user3 = TempUser::factory()->create();

        $leaderboard = Leaderboard::factory()
            ->for($game)
            ->for($user1)
            ->create([
                'is_main_user' => true,
                'status' => LeaderboardStatus::Done,
            ]);

        $leaderboard2 = Leaderboard::factory()
            ->for($game)
            ->for($user2)
            ->create([
                'status' => LeaderboardStatus::Playing,
            ]);

        $leaderboard3 = Leaderboard::factory()
            ->for($game)
            ->for($user3)
            ->create([
                'status' => LeaderboardStatus::Playing,
            ]);

        $this->instance(
            RandomLeaderboardStatus::class,
            \Mockery::mock(RandomLeaderboardStatus::class, function (MockInterface $mock) {
                $mock->shouldReceive('get')
                    ->andReturn(LeaderboardStatus::Done);
            }),
        );

        $this->artisan('leaderboards:close')->assertOk();
        $this->artisan('leaderboards:close')->assertOk();

        foreach ($game->leaderboards()->get() as $leaderboard) {
            $this->assertEquals(LeaderboardStatus::Done, $leaderboard->status);
        }

        $this->assertEquals(GameStatus::Done, $game->fresh()->status);
    }
}
