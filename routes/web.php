<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Tournaments\JoinTournamentController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['temp_user.auth']], function () {

    Route::get('/', HomeController::class);

    Route::post('/tournament/{tournament}', JoinTournamentController::class);

    Route::get('test', TestController::class);

});
