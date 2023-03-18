<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function __invoke()
    {
        $allows = \Gate::allows('show-test');

        dump($allows);

        return 'ok';
    }
}
