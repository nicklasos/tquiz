<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RoomQuestion
 *
 * @property int $id
 * @property int $room_id
 * @property int $question_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RoomQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomQuestion whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomQuestion whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RoomQuestion extends Model
{
}
