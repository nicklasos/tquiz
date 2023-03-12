<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Game;
use App\Models\GameSeed;
use App\Models\TempUser;
use App\Models\Tournament;

class CreateGame
{
    public function create(TempUser $tempUser, Tournament $tournament, GameSeed $gameSeed): Game
    {
        return Game::create([
            'temp_user_id' => $tempUser->id,
            'tournament_id' => $tournament->id,
            'game_seed_id' => $gameSeed->id,
        ]);
    }
}
