<?php

declare(strict_types=1);

namespace App\Facades;

use App\Models\TempUser;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void setId(int $id)
 * @method static int getId()
 * @method static TempUser getModelWithId()
 */
class TempUserSession extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Services\TempUsers\TempUserSession::class;
    }
}
