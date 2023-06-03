<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Http\Controllers\Controller;
use App\Models\Tournaments\Game;
use App\Queries\Images\GameImagesQuery;
use App\Queries\Tournaments\GamePlayQuery;
use App\Services\Tournaments\AnswerTimingSession;
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
