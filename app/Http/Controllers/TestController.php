<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\TempUsers\TempUserStorage;

class TestController extends Controller
{
    public function __invoke(TempUserStorage $tempUserStorage)
    {
        dump($tempUserStorage->getModelWithId()->id);

        return 'ok';
    }
}
