<?php

declare(strict_types=1);

namespace App\Models\Tournaments;

use App\Models\Theme;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Tournament
 *
 * @property int $id
 * @property int $players
 * @property int $questions
 * @property int $is_active
 * @property int $coming_soon
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-write mixed $image
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Theme> $themes
 * @property-read int|null $themes_count
 * @method static Builder|Tournament active()
 * @method static Builder|Tournament comingSoon(bool $bool = true)
 * @method static \Database\Factories\Tournaments\TournamentFactory factory($count = null, $state = [])
 * @method static Builder|Tournament newModelQuery()
 * @method static Builder|Tournament newQuery()
 * @method static Builder|Tournament query()
 * @method static Builder|Tournament whereComingSoon($value)
 * @method static Builder|Tournament whereCreatedAt($value)
 * @method static Builder|Tournament whereDescription($value)
 * @method static Builder|Tournament whereId($value)
 * @method static Builder|Tournament whereIsActive($value)
 * @method static Builder|Tournament wherePlayers($value)
 * @method static Builder|Tournament whereQuestions($value)
 * @method static Builder|Tournament whereTitle($value)
 * @method static Builder|Tournament whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tournament extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function setImageAttribute()
    {

    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 400, 400)
            ->nonQueued();
    }

    public function themes(): BelongsToMany
    {
        return $this->belongsToMany(Theme::class, 'tournament_themes');
    }

    public function scopeActive(Builder $builder): void
    {
        $builder->where('is_active', true);
    }

    public function scopeComingSoon(Builder $builder, bool $bool = true): void
    {
        $builder->where('coming_soon', $bool);
    }
}
