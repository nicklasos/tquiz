<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\GameSeed;
use App\Models\Question;
use App\Models\Tournament;
use App\Queries\Tournaments\Cached\ThemesCachedQuery;
use App\Queries\Tournaments\QuestionsQuery;

class CreateGameSeed
{
    public function __construct(
        private readonly ThemesCachedQuery $themes,
        private readonly QuestionsQuery    $questions,
    )
    {
    }

    public function create(Tournament $tournament): GameSeed
    {
        $themeIds = $this->themes->idsForTournament($tournament);

        $questions = $this->questions->randomQuestions($themeIds, $tournament->questions);

        $seed = GameSeed::create([
            'tournament_id' => $tournament->id,
        ]);

        $seed
            ->gameSeedQuestions()
            ->createMany($questions->map(fn(Question $question) => [
                'question_id' => $question->id,
            ]));

        return $seed;
    }
}
