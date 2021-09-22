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

use BristolSU\Module\StaticPage\Http\Controllers\Api\Admin\ButtonController;
use BristolSU\Module\StaticPage\Http\Controllers\Api\Admin\PageViewController;
use Illuminate\Support\Facades\Route;

Route::apiResource('page-view', PageViewController::class)->only(['index']);
Route::apiResource('click', ButtonController::class, ['as' => 'admin'])->only(['index']);
