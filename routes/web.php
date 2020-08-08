<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Redis;

Route::get('/redis', function () {
    // Redis::sadd('frontend-frameworks', ['angular', 'vuejs', 'react']);

    dd(Redis::smembers('frontend-frameworks'));
});

Auth::routes();

Route::get('/', 'FrontendController@welcome');
Route::get('/home', 'FrontendController@welcome');

Route::get('/profile/{user}', 'ProfileController@index');




Route::get('/series/{series}', 'FrontendController@series')->name('series');

Route::get('register/confirm', 'ConfirmEmailController@index')->name('confirm-email');

Route::middleware('auth')->group(function () {
    Route::get('/watch-series/{series}', 'WatchSeriesController@index')->name('series.learning');
    Route::get('/series/{series}/lesson/{lesson}', 'WatchSeriesController@showLesson')->name('series.watch');
    Route::post('/series/complete-lesson/{lesson}', 'WatchSeriesController@completeLesson');
});

Route::get('/logout', function () {
    auth()->logout();
});
