<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Game;
use App\Models\GameStatus;
use Illuminate\Database\Eloquent\Collection;

class FinishTournamentGamesQuery
{
    /**
     * @param Game $game
     * @return Collection
     */
    public function getGamesForLeaderboard(Game $game): Collection
    {
        return Game::query()
            ->where('tournament_id', $game->tournament_id)
            ->where('game_seed_id', $game->game_seed_id)
            ->whereNot('temp_user_id', $game->temp_user_id)
            ->whereIn('status', [GameStatus::Done, GameStatus::WaitingParticipants])
            ->orderByDesc('id')
            ->limit($game->tournament->players - 1)
            ->get();
    }
}
