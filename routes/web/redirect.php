<?php

use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

Route::controller(RedirectController::class)->group(function () {
    Route::get('/{slug}', 'index')->name('redirect');
});
