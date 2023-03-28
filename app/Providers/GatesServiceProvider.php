<?php

declare(strict_types=1);

namespace App\Providers;

use App\Facades\TempUserSession;
use App\Models\Game;
use Gate;
use Illuminate\Support\ServiceProvider;

class GatesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Gate::define('can-play-game', function ($user = null, Game $game = null) {
            return $game && $game->temp_user_id === TempUserSession::getId();
        });
    }
}