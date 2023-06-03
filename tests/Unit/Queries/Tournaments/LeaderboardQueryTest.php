<?php

declare(strict_types=1);

namespace Tests\Unit\Queries\Tournaments;

use App\Actions\Tournaments\FinishTournament;
use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameSeed;
use App\Models\TempUser;
use App\Models\Theme;
use App\Models\Tournaments\Tournament;
use App\Queries\Tournaments\LeaderboardQuery;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LeaderboardQueryTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetBySeedId()
    {
        $theme = Theme::factory()->create();

        $tournament = Tournament::factory()
            ->hasAttached($theme)
            ->create();

        $seed = GameSeed::factory()->for($tournament)->create();

        $games = Game::factory()
            ->for($tournament)
            ->for($seed)
            ->count(3)
            ->sequence(
                ['temp_user_id' => 1, 'score' => 3],
                ['temp_user_id' => 2, 'score' => 4],
                ['temp_user_id' => 3, 'score' => 2, 'status' => 'playing'],
            )
            ->create([
                'status' => 'waiting_participants',
            ]);

        $game = $games->last();

        $finishTournament = app(FinishTournament::class);

        $finishTournament->finish($game);

        $query = app(LeaderboardQuery::class);

        $leaderboards = $query->getByGame($game);

        $this->assertEquals(3, $leaderboards->count());
    }
}
