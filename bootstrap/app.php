<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')->group(function () {
                Route::prefix("")->group(base_path("routes/web/home.php"));
                Route::prefix("info")->group(base_path("routes/web/infos.php"));
                Route::prefix("r")->group(base_path("routes/web/redirect.php"));
                Route::prefix("shorten")->group(base_path("routes/web/shorten.php"));
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
