<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Game;
use App\Models\TempUser;
use App\Models\Tournament;
use App\Queries\Tournaments\Cached\MaxGameSeedsCachedQuery;
use App\Queries\Tournaments\FindGameSeedQuery;

class JoinTournament
{
    public function __construct(
        private readonly CreateGame              $createGame,
        private readonly CreateGameSeed          $createGameSeed,
        private readonly FindGameSeedQuery       $findGameSeed,
        private readonly MaxGameSeedsCachedQuery $maxGameSeeds,
    )
    {
    }

    public function join(TempUser $tempUser, Tournament $tournament): Game
    {
        $gameSeed = $this->findGameSeed->forUser($tempUser, $tournament);
        if (!$gameSeed) {
            if ($this->maxGameSeeds->isMaxSeedsForTournament($tournament)) {
                $gameSeed = $this->findGameSeed->randomForTournament($tournament);
            } else {
                $gameSeed = $this->createGameSeed->create($tournament);
            }
        }

        return $this->createGame->create($tempUser, $tournament, $gameSeed);
    }
}
