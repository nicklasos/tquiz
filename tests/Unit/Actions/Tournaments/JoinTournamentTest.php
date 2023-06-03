<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\Tournaments;

use App\Actions\Tournaments\JoinTournament;
use App\Models\Question;
use App\Models\TempUser;
use App\Models\Theme;
use App\Models\Tournaments\Tournament;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class JoinTournamentTest extends TestCase
{
    use DatabaseTransactions;

    public function testJoin()
    {
        $theme = Theme::factory()->create();

        $tournament = Tournament::factory()
            ->hasAttached($theme)
            ->create(['questions' => 2]);

        $question = Question::factory()
            ->for($theme)
            ->create();

        $question2 = Question::factory()
            ->for($theme)
            ->create();


        $tempUser = TempUser::factory()->create();

        $joinTournament = app(JoinTournament::class);

        $game = $joinTournament->join($tempUser, $tournament);

        $this->assertEquals($game->temp_user_id, $tempUser->id);
    }
}
