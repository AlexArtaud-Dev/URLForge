<?php

use App\Http\Controllers\InformationController;
use Illuminate\Support\Facades\Route;

Route::controller(InformationController::class)->group(function () {
    Route::get('/{slug}', 'index')->name('infos');
});
