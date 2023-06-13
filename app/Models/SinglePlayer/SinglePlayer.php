<?php

namespace App\Models\SinglePlayer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SinglePlayer\SinglePlayer
 *
 * @property int $id
 * @property int $temp_user_id
 * @property string $question_ids
 * @property \App\Models\SinglePlayer\SinglePlayerStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SinglePlayer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SinglePlayer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SinglePlayer query()
 * @method static \Illuminate\Database\Eloquent\Builder|SinglePlayer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SinglePlayer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SinglePlayer whereQuestionIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SinglePlayer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SinglePlayer whereTempUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SinglePlayer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SinglePlayer extends Model
{
    use HasFactory;

    protected $fillable = [
        'temp_user_id',
        'question_ids',
        'status',
    ];

    protected $casts = [
        'status' => SinglePlayerStatus::class,
    ];
}
