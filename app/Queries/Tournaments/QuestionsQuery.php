<?php

declare(strict_types=1);

namespace App\Queries\Tournaments;

use App\Models\Question;
use App\Models\Tournaments\Tournament;
use Illuminate\Database\Eloquent\Collection;

class QuestionsQuery
{
    /**
     * @param array|\Illuminate\Support\Collection $themeIds
     * @param int $limit
     * @return Collection<int, Question>
     */
    public function randomQuestions(
        array|\Illuminate\Support\Collection $themeIds,
        int                                  $limit
    ): Collection
    {
        return Question::query()
            ->with([
                'theme',
                'answers',
                'media',
            ])
            ->whereIn('theme_id', $themeIds)
            ->where('is_active', true)
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }
}
