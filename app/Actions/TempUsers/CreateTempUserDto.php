<?php

declare(strict_types=1);

namespace App\Actions\TempUsers;

class CreateTempUserDto
{
    public function __construct(
        public readonly string $ip,
        public readonly string $userAgent,
        public readonly string $referer,
        public readonly string $startUrl,
    )
    {
    }
}
