<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use App\Models\GameSeed;
use App\Models\Question;
use App\Models\Tournament;
use Illuminate\Support\Collection;

class CreateGameSeed
{
    /**
     * @param Tournament $tournament
     * @param Collection<int, Question> $questions
     * @return GameSeed
     */
    public function createForQuestions(Tournament $tournament, Collection $questions): GameSeed
    {
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
