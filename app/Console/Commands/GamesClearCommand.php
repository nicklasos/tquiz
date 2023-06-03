<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Tournaments\Game;
use App\Models\Tournaments\GameQuestionAnswer;
use App\Models\Tournaments\GameSeed;
use App\Models\Tournaments\GameSeedQuestion;
use App\Models\Tournaments\Leaderboard;
use Illuminate\Console\Command;

class GamesClearCommand extends Command
{
    protected $signature = 'games:clear';

    protected $description = 'Clear games, seeds, answers, etc.';

    public function handle(): void
    {
        if ($this->confirm('Are you sure you want to clear all games?')) {
            Game::truncate();
            GameQuestionAnswer::truncate();
            GameSeedQuestion::truncate();
            GameSeed::truncate();
            Leaderboard::truncate();

            $this->info('Done');
        }
    }
}
