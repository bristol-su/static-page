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

use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function() {
    Route::namespace('Admin')->group(function() {
        Route::apiResource('page-view', 'PageViewController')->only(['index']);
        Route::apiResource('click', 'ButtonController')->only(['index']);
    });
});
