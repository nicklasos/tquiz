<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function __invoke()
    {
        return 'test 1';
        return view('test');
    }
}
