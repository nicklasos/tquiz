<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Theme;
use Illuminate\Support\Collection;

class ThemesQuery
{
    /**
     * @param string ...$names
     * @return Collection<int>
     */
    public function byNames(string ...$names): Collection
    {
        return Theme::whereIn('name', $names)->pluck('id');
    }
}
