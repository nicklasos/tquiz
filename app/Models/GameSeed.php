<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Traits\Tappable;

/**
 * App\Models\GameSeed
 *
 * @property int $id
 * @property int $tournament_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GameSeedQuestion> $gameSeedQuestions
 * @property-read int|null $game_seed_questions_count
 * @property-read \App\Models\Tournament|null $tournament
 * @method static \Database\Factories\GameSeedFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed whereTournamentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GameSeed extends Model
{
    use HasFactory;

    public const MAX_SEEDS_FOR_TOURNAMENT = 200;

    protected $fillable = [
        'tournament_id',
    ];

    public function gameSeedQuestions(): HasMany
    {
        return $this->hasMany(GameSeedQuestion::class);
    }

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }

    public function gameSeedAnswers()
    {

    }
}
