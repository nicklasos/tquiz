<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Question;
use App\Models\Tournaments\Tournament;
use App\Queries\Tournaments\Cached\ThemesCachedQuery;
use Illuminate\Database\Eloquent\Collection;

class NewQuestionsQuery
{
    public function __construct(private readonly ThemesCachedQuery $themes)
    {
    }

    public function forTournament(Tournament $tournament): Collection
    {
        $themeIds = $this->themes->idsForTournament($tournament);

        return Question::query()
            ->whereIn('theme_id', $themeIds)
            ->where('is_active', true)
            ->whereRaw('id not in(
                select question_id from game_seed_questions gsq
                left join game_seeds gs on gs.id = gsq.game_seed_id
                where tournament_id = ?
            )', [$tournament->id])
            ->inRandomOrder()
            ->limit($tournament->questions)
            ->get();
    }
}
