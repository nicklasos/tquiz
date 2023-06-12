<?php

declare(strict_types=1);

namespace App\Models\Tournaments;

use App\Models\TempUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Leaderboard
 *
 * @property int $id
 * @property int $game_id
 * @property int $temp_user_id
 * @property int $is_main_user
 * @property \App\Models\Tournaments\LeaderboardStatus $status
 * @property int $score
 * @property int|null $place
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Tournaments\Game|null $game
 * @property-read TempUser|null $tempUser
 * @method static \Database\Factories\Tournaments\LeaderboardFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Leaderboard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Leaderboard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Leaderboard query()
 * @method static \Illuminate\Database\Eloquent\Builder|Leaderboard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaderboard whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaderboard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaderboard whereIsMainUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaderboard wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaderboard whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaderboard whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaderboard whereTempUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leaderboard whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Leaderboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'temp_user_id',
        'status',
        'score',
        'place',
        'is_main_user',
    ];

    protected $casts = [
        'status' => LeaderboardStatus::class,
    ];

    public function tempUser(): BelongsTo
    {
        return $this->belongsTo(TempUser::class);
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function isWinningPlace(): bool
    {
        return $this->place <= 3;
    }

    public function isPlaying(): bool
    {
        return $this->status === LeaderboardStatus::Playing;
    }

    public function isDone(): bool
    {
        return $this->status === LeaderboardStatus::Done;
    }
}
