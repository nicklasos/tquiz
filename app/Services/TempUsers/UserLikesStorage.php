<?php

declare(strict_types=1);

namespace App\Services\TempUsers;

class UserLikesStorage
{
    public function rememberLike(Like $type, int $id): void
    {
        session(["like:{$type->value}:{$id}" => true]);
    }

    public function isLiked(Like $type, int $id): bool
    {
        return session("like:{$type->value}:{$id}", false);
    }
}
