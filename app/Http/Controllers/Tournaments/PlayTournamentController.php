<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Actions\Tournaments\FinishTournament;
use App\Actions\Trivia\AnswerQuestion;
use App\Http\Controllers\Controller;
use App\Queries\Tournaments\GameQuery;
use App\Queries\Tournaments\LeaderboardQuery;
use App\Queries\Trivia\GamePlayQuery;
use App\Queries\Trivia\NextQuestionQuery;
use App\Services\TempUsers\TempUserSession;
use App\Services\Trivia\AnswerTimingSession;

class PlayTournamentController extends Controller
{
    public function __construct(
        private readonly GamePlayQuery       $gamePlayQuery,
        private readonly AnswerQuestion      $answerQuestion,
        private readonly TempUserSession     $tempUserSession,
        private readonly NextQuestionQuery   $nextQuestion,
        private readonly FinishTournament    $finishTournament,
        private readonly GameQuery           $gameQuery,
        private readonly AnswerTimingSession $answerTimingSession,
        private readonly LeaderboardQuery    $leaderboardQuery,
    )
    {
    }

    public function showQuestion(int $gameSeedId)
    {
        $question = $this->gamePlayQuery->question($gameSeedId, 1);

        $this->answerTimingSession->set($gameSeedId);

        return view('tournaments.play', compact(
            'question',
            'gameSeedId',
        ));
    }

    public function answerQuestion(int $gameSeedId, int $answerId)
    {
        $this->answerQuestion->answer(
            $this->tempUserSession->getModelWithId(),
            $gameSeedId,
            $answerId,
            $this->answerTimingSession->getSeconds($gameSeedId),
        );

        $nextQuestionNumber = $this->nextQuestion->number(
            $this->tempUserSession->getModelWithId(),
            $gameSeedId,
        );

        if (!$nextQuestionNumber) {
            $this->finishTournament->finish($this->gameQuery->bySeedAndUser(
                $this->tempUserSession->getModelWithId(),
                $gameSeedId,
            ));

            $leaderboards = $this->leaderboardQuery->getByUserAndSeedId(
                $this->tempUserSession->getModelWithId(),
                $gameSeedId,
            );

            return 'End!';
        }

        $question = $this->gamePlayQuery->question($gameSeedId, $nextQuestionNumber);

        $this->answerTimingSession->set($gameSeedId);

        return view('tournaments.question', compact(
            'gameSeedId',
            'question',
        ));
    }
}
