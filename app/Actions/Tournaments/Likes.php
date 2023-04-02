<?php

declare(strict_types=1);

namespace App\Actions\Tournaments;

use DB;

class Likes
{
    public function likeQuestion(int $id): void
    {
        DB::table('questions')
            ->where('id', $id)
            ->increment('likes');
    }

    public function dislikeQuestion(int $id): void
    {
        DB::table('questions')
            ->where('id', $id)
            ->increment('dislikes');
    }
}
