<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\RoomUser
 *
 * @property int $id
 * @property int $room_id
 * @property int $temp_user_id
 * @property string $status
 * @property int|null $place
 * @property int $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\QuestionAnswer> $questionAnswers
 * @property-read int|null $question_answers_count
 * @property-read \App\Models\Room|null $room
 * @method static \Database\Factories\RoomUserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereTempUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RoomUser extends Model
{
    use HasFactory;

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function questionAnswers(): BelongsToMany
    {
        return $this->belongsToMany(QuestionAnswer::class, 'room_users_question_answers');
    }
}
