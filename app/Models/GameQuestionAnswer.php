<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\GameQuestionAnswer
 *
 * @property int $id
 * @property int $temp_user_id
 * @property int $game_id
 * @property int $question_answer_id
 * @property int $seconds
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Game|null $game
 * @property-read \App\Models\QuestionAnswer|null $questionAnswer
 * @method static \Database\Factories\GameQuestionAnswerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer whereQuestionAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer whereSeconds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer whereTempUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GameQuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'temp_user_id',
        'game_id',
        'question_answer_id',
        'seconds',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function questionAnswer(): BelongsTo
    {
        return $this->belongsTo(QuestionAnswer::class);
    }
}
