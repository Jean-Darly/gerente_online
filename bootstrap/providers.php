<?php
//meus uses
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

return [
    App\Providers\AppServiceProvider::class,
];

class BootstrapServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts.main', function ($view) {
            $view->with('bootstrap', 'bootstrap/css/bootstrap.min.css');
        });
    }
}