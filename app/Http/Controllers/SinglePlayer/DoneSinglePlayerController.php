<?php

declare(strict_types=1);

namespace App\Http\Controllers\SinglePlayer;

use App\Actions\SinglePlayer\DoneSinglePlayerGame;
use App\Http\Controllers\Controller;
use App\Models\SinglePlayer\SinglePlayer;
use Gate;

class DoneSinglePlayerController extends Controller
{
    public function __invoke(SinglePlayer $singlePlayer, DoneSinglePlayerGame $done)
    {
        Gate::authorize('can-done-single-player', $singlePlayer);

        $done->done($singlePlayer);
    }
}
