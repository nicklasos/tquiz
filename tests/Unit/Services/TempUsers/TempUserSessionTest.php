<?php

declare(strict_types=1);

namespace Tests\Unit\Services\TempUsers;

use App\Models\TempUser;
use App\Services\TempUsers\TempUserSession;
use Tests\TestCase;

class TempUserSessionTest extends TestCase
{
    public function testSessions()
    {
        $tempUserSession = app(TempUserSession::class);

        $this->assertNull(session('temp_user_id'));

        $tempUserSession->setId(1);

        $this->assertEquals(1, $tempUserSession->getId());

        $this->assertEquals(1, session('temp_user_id'));

        session(['temp_user_id' => 2]);

        $this->assertEquals(1, $tempUserSession->getId());

        // Test cache
        $this->assertEquals(2, session('temp_user_id'));
    }
}
