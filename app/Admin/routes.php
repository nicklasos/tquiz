<?php

use App\Admin\Controllers\QuestionsController;
use App\Admin\Controllers\ThemesController;
use App\Admin\Controllers\TournamentsController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('themes', ThemesController::class);
    $router->resource('tournaments', TournamentsController::class);
    $router->resource('questions', QuestionsController::class);

});
