<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Actions\Tournaments\CloseGame;
use App\Queries\Tournaments\ExpiredGamesQuery;
use Illuminate\Console\Command;

class CloseExpiredGamesCommand extends Command
{
    protected $signature = 'expired-games:close {--silent}';

    protected $description = 'Close expired games';

    public function handle(ExpiredGamesQuery $expiredGamesQuery, CloseGame $closeGame): void
    {
        if (!$this->option('silent')) {
            $this->info('Closing expired games');
        }

        $expiredGames = $expiredGamesQuery->getExpiredGames();

        foreach ($expiredGames as $expiredGame) {
            $closeGame->close($expiredGame);
        }

        if (!$this->option('silent')) {
            $this->info("Closed games: {$expiredGames->count()}");
        }
    }
}
