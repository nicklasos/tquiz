<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\GameSeed;
use App\Models\TempUser;
use App\Models\Tournament;

class FindGameSeedQuery
{
    public function forUser(TempUser $tempUser, Tournament $tournament): ?GameSeed
    {
        // select * from game_seeds
        // where tournament_id = 1 and id not in
        // (select game_seed_id from games where tournament_id = 1 and temp_user_id = 1);

        // @todo: Refactor, potential performance issue

        return GameSeed::query()
            ->where('tournament_id', $tournament->id)
            ->whereRaw('id not in (
                select game_seed_id from games where tournament_id = ? and temp_user_id = ?
            )', [$tournament->id, $tempUser->id])
            ->inRandomOrder()
            ->limit(1)
            ->get()
            ->first();
    }

    public function randomForTournament(Tournament $tournament): ?GameSeed
    {
        return GameSeed::query()
            ->where('tournament_id', $tournament->id)
            ->inRandomOrder()
            ->limit(1)
            ->get()
            ->first();
    }
}
