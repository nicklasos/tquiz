<?php

declare(strict_types=1);

namespace App\View\Components\Tournaments;

use App\Models\Game;
use App\Models\Question as QuestionModel;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Question extends Component
{
    public function __construct(
        public readonly QuestionModel $question,
        public readonly Game          $game,
        public readonly bool          $isLastQuestion = false,
    )
    {
    }

    public function render(): View
    {
        return view('components.tournaments.question');
    }
}
