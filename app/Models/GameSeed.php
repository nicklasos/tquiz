<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\GameSeed
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameSeed whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GameSeed extends Model
{
    public function gameSeedQuestions(): HasMany
    {
        return $this->hasMany(GameSeedQuestion::class);
    }
}
