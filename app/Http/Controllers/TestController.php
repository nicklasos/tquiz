<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Question;

class TestController extends Controller
{
    public function __invoke()
    {
        return view('test');
    }
}
