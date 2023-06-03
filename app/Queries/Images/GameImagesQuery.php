<?php

declare(strict_types=1);

namespace App\Queries\Images;

use App\Models\Tournaments\GameSeedQuestion;
use Illuminate\Support\Collection;

class GameImagesQuery
{
    /**
     * @param int $gameSeedId
     * @return Collection<string>
     */
    public function allSeedImages(int $gameSeedId): Collection
    {
        return GameSeedQuestion::query()
            ->with([
                'question' => [
                    'media',
                ],
            ])
            ->whereGameSeedId($gameSeedId)
            ->get()
            ->map(fn(GameSeedQuestion $q) => $q->question->getFirstMediaUrl('image'))
            ->filter();
    }
}
