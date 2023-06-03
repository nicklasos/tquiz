<?php

declare(strict_types=1);

namespace App\Models\Tournaments;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\GameSeedQuestion
 *
 * @property int $id
 * @property int $game_seed_id
 * @property int $question_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read GameSeed|null $gameSeed
 * @property-read Question|null $question
 * @method static \Database\Factories\Tournaments\GameSeedQuestionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion whereGameSeedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GameSeedQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_seed_id',
        'question_id',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function gameSeed(): BelongsTo
    {
        return $this->belongsTo(GameSeed::class);
    }
}
