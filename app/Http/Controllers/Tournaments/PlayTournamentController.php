<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Actions\Tournaments\FinishTournament;
use App\Actions\Trivia\AnswerQuestion;
use App\Http\Controllers\Controller;
use App\Queries\Tournaments\GameQuery;
use App\Queries\Tournaments\TournamentQuery;
use App\Queries\Trivia\GamePlayQuery;
use App\Queries\Trivia\NextQuestionQuery;
use App\Services\TempUsers\TempUserStorage;

class PlayTournamentController extends Controller
{
    public function __construct(
        private readonly GamePlayQuery     $gamePlayQuery,
        private readonly AnswerQuestion    $answerQuestion,
        private readonly TempUserStorage   $tempUserStorage,
        private readonly NextQuestionQuery $nextQuestion,
        private readonly FinishTournament  $finishTournament,
        private readonly GameQuery         $gameQuery,
    )
    {
    }

    public function showQuestion(int $gameSeedId)
    {
        $question = $this->gamePlayQuery->question($gameSeedId, 1);

        return view('tournaments.play', compact('question', 'gameSeedId'));
    }

    public function answerQuestion(int $gameSeedId, int $answerId)
    {
        $this->answerQuestion->answer(
            $this->tempUserStorage->getModelWithId(),
            $gameSeedId,
            $answerId,
        );

        $nextQuestionNumber = $this->nextQuestion->number(
            $this->tempUserStorage->getModelWithId(),
            $gameSeedId,
        );

        if (!$nextQuestionNumber) {
            $this->finishTournament->finish($this->gameQuery->bySeedAndUser(
                $this->tempUserStorage->getModelWithId(),
                $gameSeedId,
            ));

            return 'End!';
        }

        $question = $this->gamePlayQuery->question($gameSeedId, $nextQuestionNumber);

        return view('tournaments.question', compact('gameSeedId', 'question'));
    }
}
