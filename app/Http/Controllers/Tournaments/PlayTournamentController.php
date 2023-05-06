<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Actions\Tournaments\FinishTournament;
use App\Actions\Tournaments\AnswerQuestion;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Queries\Tournaments\LeaderboardQuery;
use App\Queries\Tournaments\GamePlayQuery;
use App\Queries\Tournaments\NextQuestionQuery;
use App\Services\Tournaments\AnswerTimingSession;
use App\Services\Tournaments\LeaderboardService;
use Gate;

class PlayTournamentController extends Controller
{
    public function __construct(
        private readonly GamePlayQuery       $gamePlayQuery,
        private readonly AnswerQuestion      $answerQuestion,
        private readonly NextQuestionQuery   $nextQuestion,
        private readonly FinishTournament    $finishTournament,
        private readonly AnswerTimingSession $answerTimingSession,
        private readonly LeaderboardService  $leaderboardService,
    )
    {
    }

    public function showQuestion(Game $game)
    {
        Gate::authorize('can-play-game', $game);

        if ($this->gamePlayQuery->isAlreadyPlaying($game)) {
            return to_route('home');
        }

        $question = $this->gamePlayQuery->question($game, 1);

        $this->answerTimingSession->set($game);

        return view('tournaments.play', [
            'question' => $question,
            'game' => $game,
            'isLastQuestion' => false,
        ]);
    }

    public function answerQuestion(Game $game, int $answerId)
    {
        Gate::authorize('can-play-game', $game);

        // @todo: check is question already answered

        $this->answerQuestion->answer(
            $game,
            $answerId,
            $this->answerTimingSession->getSeconds($game),
        );

        $nextQuestion = $this->nextQuestion->get($game);

        if (!$nextQuestion->number) {
            $this->finishTournament->finish($game);

            $leaderboards = $this->leaderboardService->getByGame($game);

            return view('tournaments.leaderboard', compact(
                'leaderboards',
                'game',
            ));
        }

        $question = $this->gamePlayQuery->question($game, $nextQuestion->number);

        $this->answerTimingSession->set($game);

        return view('components.tournaments.question', [
            'game' => $game,
            'question' => $question,
            'isLastQuestion' => $nextQuestion->isLast,
        ]);
    }
}
