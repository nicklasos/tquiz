<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Actions\Tournaments\FinishTournament;
use App\Actions\Tournaments\AnswerQuestion;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Queries\Images\GameImagesQuery;
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
        private readonly AnswerTimingSession $answerTimingSession,
        private readonly GameImagesQuery     $gameImagesQuery,
    )
    {
    }

    public function __invoke(Game $game)
    {
        Gate::authorize('can-play-game', $game);

        if ($this->gamePlayQuery->isAlreadyPlaying($game)) {
            return to_route('home');
        }

        $question = $this->gamePlayQuery->question($game, 1);

        $this->answerTimingSession->set($game);

        $images = $this->gameImagesQuery->allSeedImages($game->game_seed_id);

        return view('tournaments.play', [
            'question' => $question,
            'game' => $game,
            'isLastQuestion' => false,
            'images' => $images,
        ]);
    }
}
