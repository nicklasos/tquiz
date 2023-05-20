<?php

declare(strict_types=1);

namespace App\Services\TempUsers;

use App\Actions\TempUsers\CreateTempUser;
use App\Actions\TempUsers\CreateTempUserDto;
use App\Models\TempUser;
use App\Services\Geo\IP;
use Illuminate\Http\Request;

class TempUserAuth
{
    public function __construct(
        private readonly CreateTempUser  $createTempUser,
    )
    {
    }

    public function authorize(Request $request): void
    {
        if ($id = \App\Facades\TempUserSession::getId()) {
            // @todo: refactor
            if (TempUser::find($id)) {
                return;
            }
        }

        // @todo: check for bots

        $createTempUserDto = new CreateTempUserDto(
            IP::get(),
            $request->header('user-agent'),
            $request->header('referer', ''),
            $request->fullUrl(),
        );

        $tempUser = $this->createTempUser->create($createTempUserDto);

        \App\Facades\TempUserSession::setId($tempUser->id);
    }
}
