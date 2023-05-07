<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function __invoke()
    {
        $n = 1243243519;

        echo substr((string)$n, -2);

        return view('test');
    }
}
