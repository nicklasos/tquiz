<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GameQuestionAnswer
 *
 * @property int $id
 * @property int $game_id
 * @property int $question_answer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer whereGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer whereQuestionAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameQuestionAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GameQuestionAnswer extends Model
{
}
