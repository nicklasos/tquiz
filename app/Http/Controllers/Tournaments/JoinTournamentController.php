<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tournaments;

use App\Http\Controllers\Controller;
use App\Models\Tournament;

class JoinTournamentController extends Controller
{
    public function __invoke(Tournament $tournament)
    {
        return 'ok';
    }
}
