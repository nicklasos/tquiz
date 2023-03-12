<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('test', TestController::class);
