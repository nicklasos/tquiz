<?php

declare(strict_types=1);

namespace App\Models\SinglePlayer;

use App\Exceptions\SinglePlayer\NoQuestionsForSinglePlayerException;
use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;

class SinglePlayerGameDto
{
    /**
     * @param SinglePlayer $singlePlayer
     * @param Collection<Question> $questions
     * @throws NoQuestionsForSinglePlayerException
     */
    public function __construct(
        public readonly SinglePlayer $singlePlayer,
        public readonly Collection $questions,
    )
    {
        if (!$this->questions->count()) {
            throw new NoQuestionsForSinglePlayerException();
        }
    }
}
