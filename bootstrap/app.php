<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;
use App\Http\Middleware\Shop;
use App\Http\Middleware\Moderator;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['web','admin'])
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));
                Route::middleware(['web','shop'])
                ->prefix('shop')
                ->name('shop.')
                ->group(base_path('routes/shop.php'));
                Route::middleware(['web','moderator'])
                ->prefix('moderator')
                ->name('moderator.')
                ->group(base_path('routes/moderator.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'admin' => Admin::class,
            'user' => User::class,
            'shop' => Shop::class,
            'moderator' => Moderator::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
