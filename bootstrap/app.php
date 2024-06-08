<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

//meus uses
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
    
    class AppServiceProvider extends ServiceProvider
    {
        public function boot()
        {
            View::composer('layouts.main', function ($view) {
                $view->with('bootstrap', 'bootstrap/css/bootstrap.min.css');
            });
        }
    }