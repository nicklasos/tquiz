<?php

declare(strict_types=1);

namespace Tests\Unit\Services\TempUsers;

use App\Services\TempUsers\Like;
use App\Services\TempUsers\UserLikesStorage;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserLikesStorageTest extends TestCase
{
    use DatabaseTransactions;

    public function testLikes()
    {
        $storage = new UserLikesStorage();

        $this->assertFalse($storage->isLiked(Like::Question, 1));

        $storage->rememberLike(Like::Question, 1);

        $this->assertTrue($storage->isLiked(Like::Question, 1));
    }
}
