<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Game
 *
 * @property int $id
 * @property int $tournament_id
 * @property int $game_seed_id
 * @property int $temp_user_id
 * @property string $status
 * @property int $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\GameSeed|null $gameSeed
 * @property-read \App\Models\TempUser|null $tempUser
 * @property-read \App\Models\Tournament|null $tournament
 * @method static \Illuminate\Database\Eloquent\Builder|Game newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game query()
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereGameSeedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereTempUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereTournamentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'temp_user_id',
        'tournament_id',
        'game_seed_id',
    ];

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }

    public function gameSeed(): BelongsTo
    {
        return $this->belongsTo(GameSeed::class);
    }

    public function tempUser(): BelongsTo
    {
        return $this->belongsTo(TempUser::class);
    }

    public function gameAnswers(): BelongsToMany
    {
        return $this->belongsToMany(QuestionAnswer::class, 'game_question_answers')
            ->withTimestamps();
    }
}
