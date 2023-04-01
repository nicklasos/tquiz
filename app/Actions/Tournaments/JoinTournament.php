<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\Game;
use App\Models\TempUser;
use App\Models\Tournament;
use App\Queries\Tournaments\Cached\MaxGameSeedsCachedQuery;
use App\Queries\Tournaments\FindGameSeedQuery;
use App\Queries\Tournaments\NewQuestionsQuery;

class JoinTournament
{
    public function __construct(
        private readonly CreateGame              $createGame,
        private readonly CreateGameSeed          $createGameSeed,
        private readonly FindGameSeedQuery       $findGameSeed,
        private readonly NewQuestionsQuery       $newQuestionsQuery,
    )
    {
    }

    public function join(TempUser $tempUser, Tournament $tournament): Game
    {
        $gameSeed = $this->findGameSeed->forUser($tempUser, $tournament);
        if (!$gameSeed) {
            $newQuestions = $this->newQuestionsQuery->forTournament($tournament);
            if ($newQuestions->count() !== $tournament->questions) {

                // @todo: log if there not enough questions for last seed

                $gameSeed = $this->findGameSeed->randomForTournament($tournament);
            } else {
                $gameSeed = $this->createGameSeed->createForQuestions($tournament, $newQuestions);
            }
        }

        return $this->createGame->create($tempUser, $tournament, $gameSeed);
    }
}
