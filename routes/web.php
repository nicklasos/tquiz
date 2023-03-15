<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Tournaments\JoinTournamentController;
use App\Http\Controllers\Tournaments\PlayTournamentController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['temp_user.auth']], function () {

    Route::get('/', HomeController::class);


    /*
    |--------------------------------------------------------------------------
    | Tournaments
    |--------------------------------------------------------------------------
    */
    Route::post('tournament/{tournament}', JoinTournamentController::class)
        ->name('tournament.join');

    Route::get('tournament/{gameSeedId}/play', [PlayTournamentController::class, 'showQuestion'])
        ->name('tournament.play');

    Route::post(
        'tournament/{gameSeedId}/answer/{answerId}',
        [PlayTournamentController::class, 'answerQuestion'],
    );

    Route::get('history', HistoryController::class)->name('history');


    /*
    |--------------------------------------------------------------------------
    | Test
    |--------------------------------------------------------------------------
    */
    Route::get('test', TestController::class);

});
