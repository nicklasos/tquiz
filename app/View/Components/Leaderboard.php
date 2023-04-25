<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Leaderboard extends Component
{
    public function render(): View
    {
        return view('components.leaderboard');
    }
}
