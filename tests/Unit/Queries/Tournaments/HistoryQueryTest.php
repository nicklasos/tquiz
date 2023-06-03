<?php

declare(strict_types=1);

namespace Tests\Unit\Queries\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameSeed;
use App\Models\Tournaments\GameStatus;
use App\Models\TempUser;
use App\Models\Tournaments\Tournament;
use App\Queries\Tournaments\HistoryQuery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class HistoryQueryTest extends TestCase
{
    use DatabaseTransactions;

    public function testGet()
    {
        $tempUser = TempUser::factory()->create();

        $tournament = Tournament::factory()->create();

        $gameSeed = GameSeed::factory()
            ->for($tournament)
            ->create();

        $game = Game::factory()
            ->for($tempUser)
            ->for($tournament)
            ->for($gameSeed)
            ->create([
                'status' => 'done',
                'place' => 2,
                'score' => 14,
            ]);


        $historyQuery = app(HistoryQuery::class);

        $historyGames = $historyQuery->get($tempUser, [GameStatus::Done]);

        $this->assertTrue($historyGames->first()->is($game));
    }
}
