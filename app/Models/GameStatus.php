<?php

declare(strict_types=1);

namespace App\Models;

enum GameStatus: string
{
    case Playing = 'playing';
    case WaitingParticipants = 'waiting_participants';
    case WaitingFakeParticipants = 'waiting_fake_participants';
    case Done = 'done';
    case Expired = 'expired';
}
