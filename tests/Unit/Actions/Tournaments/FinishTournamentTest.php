<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\Tournaments;

use App\Actions\Tournaments\FinishTournament;
use App\Models\Game;
use App\Models\GameSeed;
use App\Models\Theme;
use App\Models\Tournament;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class FinishTournamentTest extends TestCase
{
    use DatabaseTransactions;

    public function testFinish()
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
                ['temp_user_id' => 1, 'score' => 129],
                ['temp_user_id' => 2, 'score' => 40],
                ['temp_user_id' => 3, 'score' => 70, 'status' => 'playing'],
            )
            ->create([
                'status' => 'waiting_participants',
            ]);

        $game = $games->last();

        $finishTournament = app(FinishTournament::class);

        $finishTournament->finish($game);

        $leaderboards = $game->leaderboards;

        $this->assertEquals(2, $game->place);

        $this->assertEquals(2, $leaderboards->last()->temp_user_id);
    }
}
