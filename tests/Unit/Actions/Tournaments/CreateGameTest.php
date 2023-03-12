<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\Tournaments;

use App\Actions\Tournaments\CreateGame;
use App\Models\GameSeed;
use App\Models\TempUser;
use App\Models\Tournament;
use Tests\TestCase;

class CreateGameTest extends TestCase
{
    public function testCreate()
    {
        $createGame = app(CreateGame::class);

        $tempUser = TempUser::factory()->create();
        $tournament = Tournament::factory()->create();
        $gameSeed = GameSeed::factory()->create();

        $game = $createGame->create(
            $tempUser,
            $tournament,
            $gameSeed,
        );

        $this->assertEquals($game->tournament_id, $tournament->id);
    }
}
