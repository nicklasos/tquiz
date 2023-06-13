<?php

declare(strict_types=1);

namespace App\Actions\SinglePlayer;

use App\Models\SinglePlayer\SinglePlayer;
use App\Models\SinglePlayer\SinglePlayerStatus;

class DoneSinglePlayerGame
{
    public function done(SinglePlayer $singlePlayer): void
    {
        $singlePlayer->status = SinglePlayerStatus::Done;
        $singlePlayer->save();
    }
}
