<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function __invoke()
    {
//        return 'ok';
//        return view('test');

        return [
            'name' => 'TQuiz',
            'description' => 'Quiz game',
            'subscribers_count' => 2,
            'stargazers_count' => 3,
            'forks_count' => mt_rand(0, 1000),
        ];
    }
}
