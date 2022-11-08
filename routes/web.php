<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\QueenController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\WatchController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WatchController::class,'episodes']);


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    Route::prefix('queens')->controller(QueenController::class)->group(function() {
        Route::get('/', 'index')->name('queens/index');
        Route::get('create', 'create')->name('queens/create');
        Route::post('store','store')->name('queens/store');

        Route::prefix('{queen}')->group(function() {
            Route::get('edit', 'edit')->name('queens/edit');
            Route::post('update', 'update')->name('queens/update');
            Route::get('delete', 'delete')->name('queens/delete');
        });
    });

    Route::prefix('series')->controller(SeriesController::class)->group(function() {
        Route::get('/', 'index')->name('series/index');
        Route::get('create','create')->name('series/create');
        Route::post('store','store')->name('series/store');

        Route::prefix('{series}')->controller(SeriesController::class)->group(function() {
            Route::get('edit','edit')->name('series/edit');
            Route::post('update','update')->name('series/update');
            Route::get('delete','delete')->name('series/delete');
        });
    });


    Route::prefix('seasons')->controller(SeasonController::class)->group(function() {
        Route::get('/','index')->name('seasons/index');
        Route::get('create','create')->name('seasons/create');
        Route::post('store','store')->name('seasons/store');


        Route::prefix('{season}')->group(function() {
            Route::post('addQueen','addQueen')->name('seasons/addQueen');
            Route::get('edit','edit')->name('seasons/edit');
            Route::get('start','start')->name('seasons/start');
            Route::get('results','results')->name('seasons/results');
            Route::post('update','update')->name('seasons/update');
            Route::get('delete','delete')->name('seasons/delete');
        });
    });

});


Route::prefix('watch')->controller(WatchController::class)->group(function() {
    Route::get('', 'episodes')->name('watch');
    Route::prefix('{episode}')->group(function() {
        Route::get('summary', 'summary')->name('watch/summary');
        Route::get('{stage}', 'watch')->name('watch/play');
    });
});
