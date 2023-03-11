<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Tournament
 *
 * @property int $id
 * @property int $questions
 * @property int $is_active
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Theme> $themes
 * @property-read int|null $themes_count
 * @method static Builder|Tournament active()
 * @method static \Database\Factories\TournamentFactory factory($count = null, $state = [])
 * @method static Builder|Tournament newModelQuery()
 * @method static Builder|Tournament newQuery()
 * @method static Builder|Tournament query()
 * @method static Builder|Tournament whereCreatedAt($value)
 * @method static Builder|Tournament whereDescription($value)
 * @method static Builder|Tournament whereId($value)
 * @method static Builder|Tournament whereIsActive($value)
 * @method static Builder|Tournament whereQuestions($value)
 * @method static Builder|Tournament whereTitle($value)
 * @method static Builder|Tournament whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tournament extends Model
{
    use HasFactory;

    public function themes(): BelongsToMany
    {
        return $this->belongsToMany(Theme::class, 'tournament_themes');
    }

    public function scopeActive(Builder $builder): void
    {
        $builder->where('is_active', true);
    }
}
