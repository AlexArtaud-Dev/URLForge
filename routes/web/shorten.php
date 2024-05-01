<?php

use App\Http\Controllers\ShorteningController;
use Illuminate\Support\Facades\Route;

Route::controller(ShorteningController::class)->group(function () {
    Route::get('/', 'index')->name('shorten.index');
});
