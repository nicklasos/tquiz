<?php

declare(strict_types=1);

namespace App\Services\TempUsers;

use App\Actions\TempUsers\CreateTempUser;
use App\Actions\TempUsers\CreateTempUserDto;
use App\Services\IP;
use Illuminate\Http\Request;

class TempUserAuth
{
    public function __construct(
        private readonly TempUserSession $tempUserStorage,
        private readonly CreateTempUser  $createTempUser,
    )
    {
    }

    public function authorize(Request $request): void
    {
        if ($this->tempUserStorage->getId()) {
            return;
        }

        // @todo: check for bots

        $createTempUserDto = new CreateTempUserDto(
            IP::get(),
            $request->header('user-agent'),
            $request->header('referer', ''),
            $request->fullUrl(),
        );

        $tempUser = $this->createTempUser->create($createTempUserDto);

        $this->tempUserStorage->setId($tempUser->id);
    }
}
