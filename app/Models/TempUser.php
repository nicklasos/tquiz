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
 * @property string $name
 * @property string $ip
 * @property string|null $user_agent
 * @property string|null $referer
 * @property string|null $start_url
 * @property int $rnd
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TempUserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereReferer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereRnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereStartUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempUser whereUserAgent($value)
 * @mixin \Eloquent
 */
class TempUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'hash',
        'name',
        'ip',
        'user_agent',
        'referer',
        'start_url',
        'rnd',
    ];

    public function getAvatar(): string
    {
        return intval(substr((string)$this->id, -2)) . '.png';
    }
}
