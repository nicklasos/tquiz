<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Tournaments\QuestionAnswer;
use App\Models\Theme;
use App\Models\Tournaments\Tournament;
use Illuminate\Database\Seeder;

class TournamentsSeeder extends Seeder
{
    public function run(): void
    {
        $theme = Theme::factory()->create([
            'name' => 'Nintendo',
        ]);

        $tournament = Tournament::factory()
            ->hasAttached($theme)
            ->create([
                'players' => 3,
                'questions' => 3,
                'is_active' => true,
                'title' => 'Super Mario',
                'description' => 'Question about Super Mario games!',
            ]);

        $question = Question::factory()
            ->for($theme)
            ->create([
                'question' => "What's the name of Mario's brother?",
            ]);

        QuestionAnswer::factory()
            ->for($question)
            ->count(4)
            ->sequence(
                ['answer' => "Luigi", 'is_correct' => true],
                ['answer' => "Bowser", 'is_correct' => false],
                ['answer' => "Olkhovyk Mykyta", 'is_correct' => true],
                ['answer' => "Koopa", 'is_correct' => false],
            )
            ->create();

        $question2 = Question::factory()
            ->for($theme)
            ->create([
                'question' => 'Who is Bowser?',
            ]);

        QuestionAnswer::factory()
            ->for($question2)
            ->count(4)
            ->sequence(
                ['answer' => "Boss of Nintendo", 'is_correct' => true],
                ['answer' => "Mario's deadly enemy", 'is_correct' => true],
                ['answer' => "Mario's best friend", 'is_correct' => false],
                ['answer' => "Mario's girlfriend", 'is_correct' => false],
            )
            ->create();



        $question3 = Question::factory()
            ->for($theme)
            ->create([
                'question' => 'Who is Koopa?',
            ]);

        QuestionAnswer::factory()
            ->for($question3)
            ->count(4)
            ->sequence(
                ['answer' => "Boss of Nintendo", 'is_correct' => true],
                ['answer' => "Bowser!", 'is_correct' => true],
                ['answer' => "Browser", 'is_correct' => false],
                ['answer' => "Ninja", 'is_correct' => false],
            )
            ->create();
    }
}
