<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Actions\Tournaments\CloseGame;
use App\Queries\Tournaments\ExpiredGamesQuery;
use Illuminate\Console\Command;

class CloseExpiredGamesCommand extends Command
{
    protected $signature = 'expired-games:close';

    protected $description = 'Close expired games';

    public function handle(ExpiredGamesQuery $expiredGamesQuery, CloseGame $closeGame): void
    {
        $this->info('Closing expired games');

        $expiredGames = $expiredGamesQuery->getExpiredGames();

        foreach ($expiredGames as $expiredGame) {
            $closeGame->close($expiredGame);
        }
    }
}
