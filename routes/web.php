<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalPagesController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Tournaments\JoinTournamentController;
use App\Http\Controllers\Tournaments\PlayTournamentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Legal Pages
|--------------------------------------------------------------------------
*/
Route::get('privacy-policy', [LegalPagesController::class, 'privacy']);
Route::get('terms-of-service', [LegalPagesController::class, 'tos']);

Route::group(['middleware' => ['temp_user.auth']], function () {

    Route::get('/', HomeController::class)->name('home');

    /*
    |--------------------------------------------------------------------------
    | Test
    |--------------------------------------------------------------------------
    */
    Route::get('test', TestController::class);

    /*
    |--------------------------------------------------------------------------
    | Tournaments
    |--------------------------------------------------------------------------
    */
    Route::post('tournament/{tournament}', JoinTournamentController::class)
        ->name('tournament.join');

    Route::get('tournament/{game}/play', [PlayTournamentController::class, 'showQuestion'])
        ->name('tournament.play');

    Route::post(
        'tournament/{game}/answer/{answerId}',
        [PlayTournamentController::class, 'answerQuestion'],
    );

    Route::get('history', HistoryController::class)->name('history');


});
