<?php

declare(strict_types=1);

namespace App\Services;

class TempUserId
{
    public function generate(): string
    {
        return uniqid('', true);
    }
}
