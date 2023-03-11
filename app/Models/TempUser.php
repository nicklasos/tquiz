<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TempUser
 *
 * @property int $id
 * @property string $hash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TempUserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TempUser extends Model
{
    use HasFactory;
}
