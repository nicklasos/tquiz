<?php

declare(strict_types=1);

namespace App\Actions\TempUsers;

use App\Models\TempUser;
use App\Services\TempUsers\RandomNames;
use App\Services\TempUsers\TempUserId;

class CreateTempUser
{
    public function __construct(
        private readonly TempUserId $id,
        private readonly RandomNames $names,
    )
    {
    }

    public function create(CreateTempUserDto $tempUserDto): TempUser
    {
        return TempUser::create([
            'hash' => $this->id->generate(),
            'name' => $this->names->generate(),
            'ip' => $tempUserDto->ip,
            'user_agent' => $tempUserDto->userAgent,
            'referrer' => $tempUserDto->referer,
            'start_url' => $tempUserDto->startUrl,
            'rnd' => random_int(1, 100),
        ]);
    }
}
