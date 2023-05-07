<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ConsoleTestCommand extends Command
{
    protected $signature = 'console:test';

    protected $description = 'For testing purposes';

    public function handle(): void
    {
    }
}
