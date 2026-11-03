<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Routes;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        //api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',

        //Run afterv the routes are registered
        then: function (){
            Route::middleware('api')
            ->prefix('api/v1')
            ->group(base_path('routes/api_v1.php'));

            //Futuere versions are registered the same way
            //Route::middleware('api)
            //->prefix(api/v2)
            //->group(base_path('routes/api_v2.php'));

        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
       //Always answer with JSON (never an HTMl page) for URLS thagt start with api/
    $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })->create();
