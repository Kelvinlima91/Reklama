<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        /*
        |----------------------------------------------------------------------
        | Register custom auth middleware aliases
        |----------------------------------------------------------------------
        | These are used in routes/web.php to protect each dashboard.
        |
        | Usage:
        |   Route::middleware('auth.user')      → consumers only
        |   Route::middleware('auth.empresa')   → companies only
        |   Route::middleware('auth.regulador') → regulators only
        */

        $middleware->alias([
            'auth.user'      => \App\Http\Middleware\AuthUser::class,
            'auth.empresa'   => \App\Http\Middleware\AuthEmpresa::class,
            'auth.regulador' => \App\Http\Middleware\AuthRegulador::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
