<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\Room;
use App\Models\RoomUser;
use App\Models\Tournament;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TournamentsModelsTest extends TestCase
{
    use DatabaseTransactions;

    public function testTournamentsModels()
    {
        $tournament = Tournament::factory()->create();

        $question = Question::factory()
            ->for($tournament)
            ->create();

        $wrongAnswers = QuestionAnswer::factory()
            ->for($question)
            ->count(3)
            ->create();

        $correctAnswer = QuestionAnswer::factory()
            ->for($question)
            ->correct()
            ->create();


        $room = Room::factory()
            ->for($tournament)
            ->create();


        $roomUsers = RoomUser::factory()
            ->for($room)
            ->count(3)
            ->sequence(
                ['temp_user_id' => 1],
                ['temp_user_id' => 2],
                ['temp_user_id' => 3],
            )
            ->create();


        $room->questions()->save($question);

        $this->assertEquals($tournament->id, $room->questions->first()->tournament_id);

        $roomUsers[0]->questionAnswers()->save($correctAnswer);

        $answer = $roomUsers[0]->questionAnswers->first();

        $this->assertEquals($answer->id, $correctAnswer->id);
    }
}
