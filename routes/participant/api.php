<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Api\Participant')->group(function() {
    Route::apiResource('click', 'ButtonController')
      ->only(['index', 'store', 'destroy'])
      ->parameters(['click' => 'static_page_button_click']);
});
