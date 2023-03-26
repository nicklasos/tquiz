<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CloseExpiredGamesCommand extends Command
{
    protected $signature = 'expired-games:close';

    protected $description = 'Close expired games';

    public function handle(): void
    {
        $this->info('Closing expired games');
    }
}
