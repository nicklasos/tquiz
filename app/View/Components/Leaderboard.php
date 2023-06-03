<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Tournaments\Game;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Leaderboard extends Component
{
    /**
     * @param Game $game
     * @param Collection<\App\Models\Tournaments\Leaderboard> $leaderboards
     */
    public function __construct(
        public readonly Game       $game,
        public readonly Collection $leaderboards,
    )
    {
    }

    public function render(): View
    {
        return view('components.leaderboard');
    }
}
