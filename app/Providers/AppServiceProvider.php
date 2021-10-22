<?php

namespace App\Providers;

use App\View\Components\Component\ComputerCase;
use App\View\Components\Component\CPU;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') !== 'local'){
            URL::forceScheme('https');
        }

        Blade::component('cpu',CPU::class);
        Blade::component('computer-case', ComputerCase::class);
        Paginator::useBootstrap();
    }
}
