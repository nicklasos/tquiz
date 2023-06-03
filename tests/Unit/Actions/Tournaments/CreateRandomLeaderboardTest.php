<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\Tournaments;

use App\Actions\Tournaments\CreateRandomLeaderboard;
use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameSeed;
use App\Models\Tournaments\Leaderboard;
use App\Models\Tournaments\LeaderboardStatus;
use App\Models\TempUser;
use App\Models\Tournaments\Tournament;
use App\Services\Tournaments\RandomLeaderboardStatus;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class CreateRandomLeaderboardTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreate()
    {

        $tournament = Tournament::factory()->create();

        $gameSeed = GameSeed::factory()
            ->for($tournament)
            ->create();

        $tempUser = TempUser::factory()->create();

        $game = Game::factory()
            ->for($tempUser)
            ->for($gameSeed)
            ->for($tournament)
            ->create();

        $game->setLeaderboardPlace(1);


        $random = Mockery::mock(RandomLeaderboardStatus::class, function (MockInterface $mock) {
            $mock
                ->shouldReceive('get')
                ->andReturn(LeaderboardStatus::Playing);
        });

        $createRandomLeaderboard = new CreateRandomLeaderboard(
            $random
        );

        $createRandomLeaderboard->create(
            forGameId: $game->id,
            game: $game,
            isMainUser: true,
        );

        $leaderboard = Leaderboard::query()
            ->where('temp_user_id', $tempUser->id)
            ->orderByDesc('id')
            ->first();

        $this->assertEquals(LeaderboardStatus::Done, $leaderboard->status);


        $random = Mockery::mock(RandomLeaderboardStatus::class, function (MockInterface $mock) {
            $mock
                ->shouldReceive('get')
                ->andReturn(LeaderboardStatus::Playing);
        });

        $createRandomLeaderboard = new CreateRandomLeaderboard(
            $random
        );

        $createRandomLeaderboard->create(
            forGameId: $game->id,
            game: $game,
            isMainUser: false,
        );

        $leaderboard = Leaderboard::query()
            ->where('temp_user_id', $tempUser->id)
            ->orderByDesc('id')
            ->first();

        $this->assertEquals(LeaderboardStatus::Playing, $leaderboard->status);
    }
}
