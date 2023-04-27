<?php

declare(strict_types=1);

namespace App\View\Components\Tournaments;

use App\Models\Game;
use App\Models\GameStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class ResultsList extends Component
{
    public function __construct(public readonly Collection $games)
    {
    }

    public function render(): View
    {
        return view('components.tournaments.results-list');
    }
}
