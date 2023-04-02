<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Tournaments\Likes;
use App\Services\TempUsers\Like;
use App\Services\TempUsers\UserLikesStorage;

class QuestionLikesController extends Controller
{
    public function __construct(
        private readonly Likes            $likes,
        private readonly UserLikesStorage $likesStorage,
    )
    {
    }

    public function like(int $id)
    {
        if (!$this->likesStorage->isLiked(Like::Question, $id)) {
            $this->likesStorage->rememberLike(Like::Question, $id);
            $this->likes->likeQuestion($id);
        }
    }

    public function dislike(int $id)
    {
        if (!$this->likesStorage->isLiked(Like::Question, $id)) {
            $this->likesStorage->rememberLike(Like::Question, $id);
            $this->likes->dislikeQuestion($id);
        }
    }
}
