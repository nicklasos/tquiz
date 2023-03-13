<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Services\TempUsers\TempUserAuth;
use Closure;
use Illuminate\Http\Request;

class TempUserAuthMiddleware
{
    public function __construct(private readonly TempUserAuth $tempUserAuth)
    {
    }

    public function handle(Request $request, Closure $next)
    {
        $this->tempUserAuth->authorize($request);

        return $next($request);
    }
}
