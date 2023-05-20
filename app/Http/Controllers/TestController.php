<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function __invoke()
    {
        dd(\App\Facades\TempUserSession::getModelWithId());

        return view('test');
    }
}
