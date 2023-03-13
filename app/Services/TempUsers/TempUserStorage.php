<?php

declare(strict_types=1);

namespace App\Services\TempUsers;

use App\Models\TempUser;

class TempUserStorage
{
    private const USER_ID = 'temp_user_id';

    private int $id = 0;

    public function setId(int $id): void
    {
        $this->id = $id;
        session([self::USER_ID => $id]);
    }

    public function getId(): int
    {
        if (!$this->id) {
            $this->id = session(self::USER_ID, 0);
        }

        return $this->id;
    }

    public function getModelWithId(): TempUser
    {
        return new TempUser(['id' => $this->getId()]);
    }
}
