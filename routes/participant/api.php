<?php

use BristolSU\Module\StaticPage\Http\Controllers\Api\Participant\ButtonController;
use Illuminate\Support\Facades\Route;

Route::apiResource('click', ButtonController::class)
  ->only(['index', 'store', 'destroy'])
  ->parameters(['click' => 'static_page_button_click']);
