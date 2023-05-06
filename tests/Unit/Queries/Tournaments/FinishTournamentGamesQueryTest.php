<?php

declare(strict_types=1);

namespace Tests\Unit\Queries\Tournaments;

use App\Models\Game;
use App\Models\GameSeed;
use App\Models\GameStatus;
use App\Models\TempUser;
use App\Models\Tournament;
use App\Queries\Tournaments\FinishTournamentGamesQuery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class FinishTournamentGamesQueryTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetGamesForLeaderboard()
    {
        $tournament = Tournament::factory()->create();

        $gameSeed = GameSeed::factory()
            ->for($tournament)
            ->create();

        $player1 = TempUser::factory()->create();
        $player2 = TempUser::factory()->create();
        $player3 = TempUser::factory()->create();

        $game1 = Game::factory()
            ->for($tournament)
            ->for($gameSeed)
            ->for($player1)
            ->create([
                'status' => GameStatus::Done,
            ]);

        $game2 = Game::factory()
            ->for($tournament)
            ->for($gameSeed)
            ->for($player2)
            ->create([
                'status' => GameStatus::Done,
            ]);

        $game3 = Game::factory()
            ->for($tournament)
            ->for($gameSeed)
            ->for($player2)
            ->create([
                'status' => GameStatus::Done,
            ]);

        $gameForUser = Game::factory()
            ->for($tournament)
            ->for($gameSeed)
            ->for($player3)
            ->create([
                'status' => GameStatus::Done,
            ]);


        $finish = app(FinishTournamentGamesQuery::class);

        $games = $finish->getGamesForLeaderboard($gameForUser);

        $this->assertEquals($player2->id, $games[0]->temp_user_id);
        $this->assertEquals($player1->id, $games[1]->temp_user_id);

        $this->assertCount(2, $games);
    }
}
