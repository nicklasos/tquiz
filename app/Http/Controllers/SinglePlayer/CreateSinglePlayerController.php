<?php

declare(strict_types=1);

namespace App\Http\Controllers\SinglePlayer;

use App\Actions\SinglePlayer\CreateSinglePlayerGame;
use App\Facades\TempUserSession;
use App\Http\Controllers\Controller;

class CreateSinglePlayerController extends Controller
{
    public function __invoke(CreateSinglePlayerGame $singlePlayerGame)
    {
        $singlePlayerDto = $singlePlayerGame->create(TempUserSession::getModelWithId());

        return view('single-player.index', [
            'singlePlayer' => $singlePlayerDto,
        ]);
    }
}
