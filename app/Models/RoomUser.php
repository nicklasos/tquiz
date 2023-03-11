<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RoomUser
 *
 * @property int $id
 * @property int $room_id
 * @property int $temp_user_id
 * @property int $score
 * @property int|null $place
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereTempUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RoomUser extends Model
{
}
