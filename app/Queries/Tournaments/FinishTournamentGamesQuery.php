<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class FinishTournamentGamesQuery
{
    /**
     * @param Game $game
     * @return Collection<Game>
     */
    public function getGamesForLeaderboard(Game $game): Collection
    {
        $subQuery = DB::table('games')
            ->select('temp_user_id', DB::raw('MAX(id) as max_id'))
            ->where('tournament_id', $game->tournament_id)
            ->where('game_seed_id', $game->game_seed_id)
            ->whereNot('temp_user_id', $game->temp_user_id)
            ->whereIn('status', [GameStatus::Done, GameStatus::WaitingParticipants])
            ->groupBy('temp_user_id');

        return Game::joinSub($subQuery, 'unique_games', function ($join) {
            $join->on('games.id', '=', 'unique_games.max_id');
        })
            ->orderBy('games.id', 'desc')
            ->limit($game->tournament->players - 1)
            ->get();
    }
}
