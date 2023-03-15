<?php

declare(strict_types=1);

namespace App\Services\TempUsers;

use App\Models\TempUser;

class TempUserSession
{
    private const USER_ID = 'temp_user_id';

    private int $id = 0;

    public function setId(int $id): void
    {
        session([self::USER_ID => $this->id = $id]);
    }

    public function getId(): int
    {
        return $this->id ??= session(self::USER_ID, 0);
    }

    public function getModelWithId(): TempUser
    {
        return new TempUser(['id' => $this->getId()]);
    }
}
