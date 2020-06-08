<?php

\Illuminate\Support\Facades\Route::namespace('Api\Participant')->group(function() {
    \Illuminate\Support\Facades\Route::apiResource('click', 'ButtonController')->only(['index', 'store']);
});