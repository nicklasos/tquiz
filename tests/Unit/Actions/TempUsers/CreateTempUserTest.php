<?php

declare(strict_types=1);

namespace Tests\Unit\Actions\TempUsers;

use App\Actions\TempUsers\CreateTempUser;
use App\Actions\TempUsers\CreateTempUserDto;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreateTempUserTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreate()
    {
        $createTempUser = app(CreateTempUser::class);

        $createTempUserDto = new CreateTempUserDto(
            '8.8.8.8',
            'Chrome',
            'https://google.com',
            'https:/tquiz.test',
        );

        $tempUser = $createTempUser->create($createTempUserDto);

        $this->assertNotEmpty($tempUser->name);
        $this->assertNotEmpty($tempUser->hash);
    }
}
