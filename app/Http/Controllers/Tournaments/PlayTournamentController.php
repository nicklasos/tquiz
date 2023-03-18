<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Actions\Tournaments\FinishTournament;
use App\Actions\Trivia\AnswerQuestion;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Queries\Tournaments\LeaderboardQuery;
use App\Queries\Trivia\GamePlayQuery;
use App\Queries\Trivia\NextQuestionQuery;
use App\Services\Trivia\AnswerTimingSession;

class PlayTournamentController extends Controller
{
    public function __construct(
        private readonly GamePlayQuery       $gamePlayQuery,
        private readonly AnswerQuestion      $answerQuestion,
        private readonly NextQuestionQuery   $nextQuestion,
        private readonly FinishTournament    $finishTournament,
        private readonly AnswerTimingSession $answerTimingSession,
        private readonly LeaderboardQuery    $leaderboardQuery,
    )
    {
    }

    public function showQuestion(Game $game)
    {
        $question = $this->gamePlayQuery->question($game, 1);

        $this->answerTimingSession->set($game);

        return view('tournaments.play', compact('question', 'game'));
    }

    public function answerQuestion(Game $game, int $answerId)
    {
        $this->answerQuestion->answer(
            $game,
            $answerId,
            $this->answerTimingSession->getSeconds($game),
        );

        $nextQuestionNumber = $this->nextQuestion->number($game);

        if (!$nextQuestionNumber) {
            $this->finishTournament->finish($game);

            $leaderboards = $this->leaderboardQuery->getByGame($game);

            return view('tournaments.leaderboard', compact('leaderboards'));
        }

        $question = $this->gamePlayQuery->question($game, $nextQuestionNumber);

        $this->answerTimingSession->set($game);

        return view('tournaments.question', compact('game', 'question'));
    }
}
