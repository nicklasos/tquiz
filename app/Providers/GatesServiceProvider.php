<?php

declare(strict_types=1);

namespace App\Providers;

use App\Facades\TempUserSession;
use App\Models\Game;
use App\Models\Tournament;
use Gate;
use Illuminate\Support\ServiceProvider;

class GatesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Tournaments
        |--------------------------------------------------------------------------
        */

        Gate::define('can-play-game', function ($user = null, Game $game = null) {
            return $game && $game->temp_user_id === TempUserSession::getId();
        });

        Gate::define('can-join-tournament', function ($user = null, Tournament $tournament = null) {
            return $tournament && $tournament->is_active && !$tournament->coming_soon;
        });

        Gate::define('can-view-result', function ($user = null, Game $game = null) {
            return $game && $game->temp_user_id === TempUserSession::getId();
        });
    }
}
