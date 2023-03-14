<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\QuestionAnswer> $gameAnswers
 * @property-read int|null $game_answers_count
 * @property-read \App\Models\GameSeed|null $gameSeed
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Leaderboard> $leaderboards
 * @property-read int|null $leaderboards_count
 * @property-read \App\Models\TempUser|null $tempUser
 * @property-read \App\Models\Tournament|null $tournament
 * @method static \Database\Factories\GameFactory factory($count = null, $state = [])
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

    private int $place;

    public function setPlace(int $place): void
    {
        $this->place = $place;
    }

    public function getPlace(): int
    {
        return $this->place;
    }

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

    public function leaderboards(): HasMany
    {
        return $this->hasMany(Leaderboard::class);
    }
}
