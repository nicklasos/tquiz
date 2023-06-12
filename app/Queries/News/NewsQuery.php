<?php

declare(strict_types=1);

namespace App\Queries\News;

use App\Models\News;
use Illuminate\Database\Eloquent\Collection;

class NewsQuery
{
    /**
     * @return Collection<News>
     */
    public function latest(): Collection
    {
        return News::whereIsPublished(true)
            ->orderByDesc('id')
            ->get();
    }
}
