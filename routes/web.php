<?php

use App\Http\Controllers\Tournaments\AnswerController;
use App\Http\Controllers\Tournaments\LeaderboardController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalPagesController;
use App\Http\Controllers\QuestionLikesController;
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

    Route::get('tournament/{game}/play', PlayTournamentController::class)
        ->name('tournament.play');

    Route::post('tournament/{game}/answer/{answerId}', AnswerController::class);

    Route::get('results', ResultsController::class)->name('results');

    /*
    |--------------------------------------------------------------------------
    | Leaderboard
    |--------------------------------------------------------------------------
    */
    Route::get('tournament/{game}/leaderboard', LeaderboardController::class);


    /*
    |--------------------------------------------------------------------------
    | Likes
    |--------------------------------------------------------------------------
    */
    Route::post('question/{id}/like', [QuestionLikesController::class, 'like']);
    Route::post('question/{id}/dislike', [QuestionLikesController::class, 'dislike']);
});

Route::view('design', 'design');
