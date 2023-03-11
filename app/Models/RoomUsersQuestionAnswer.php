<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RoomUsersQuestionAnswer
 *
 * @property int $id
 * @property int $room_user_id
 * @property int $question_answer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUsersQuestionAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUsersQuestionAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUsersQuestionAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUsersQuestionAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUsersQuestionAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUsersQuestionAnswer whereQuestionAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUsersQuestionAnswer whereRoomUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoomUsersQuestionAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RoomUsersQuestionAnswer extends Model
{
}
