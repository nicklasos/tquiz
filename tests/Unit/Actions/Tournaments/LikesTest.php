<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\Tournaments;

use App\Actions\Tournaments\Likes;
use App\Models\Question;
use App\Models\Theme;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LikesTest extends TestCase
{
    use DatabaseTransactions;

    public function testLikes()
    {
        $theme = Theme::factory()->create();

        $question = Question::factory()
            ->for($theme)
            ->create();

        $question->refresh();

        $this->assertEquals(0, $question->likes);
        $this->assertEquals(0, $question->dislikes);

        $likes = app(Likes::class);

        $likes->likeQuestion($question->id);
        $likes->likeQuestion($question->id);

        $question->refresh();

        $this->assertEquals(2, $question->likes);
        $this->assertEquals(0, $question->dislikes);

        $likes->dislikeQuestion($question->id);

        $question->refresh();

        $this->assertEquals(1, $question->dislikes);
    }
}
