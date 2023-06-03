<?php

declare(strict_types=1);

namespace App\Models\Tournaments;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TournamentTheme
 *
 * @property int $id
 * @property int $tournament_id
 * @property int $theme_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TournamentTheme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TournamentTheme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TournamentTheme query()
 * @method static \Illuminate\Database\Eloquent\Builder|TournamentTheme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TournamentTheme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TournamentTheme whereThemeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TournamentTheme whereTournamentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TournamentTheme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TournamentTheme extends Model
{
}
