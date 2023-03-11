<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GameSeedQuestion
 *
 * @property int $id
 * @property int $game_seed_id
 * @property int $question_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion whereGameSeedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeedQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GameSeedQuestion extends Model
{
    protected $fillable = [
        'game_seed_id',
        'question_id',
    ];
}
