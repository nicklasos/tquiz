<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Actions\Tournaments\AnswerQuestion;
use App\Actions\Tournaments\FinishTournament;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Queries\Tournaments\GamePlayQuery;
use App\Queries\Tournaments\NextQuestionQuery;
use App\Services\Tournaments\AnswerTimingSession;
use App\Services\Tournaments\LeaderboardService;
use Gate;
use Illuminate\Support\Sleep;

class AnswerController extends Controller
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

    public function __invoke(Game $game, int $answerId)
    {
        Gate::authorize('can-play-game', $game);

        Sleep::sleep(2);

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
