<?php

namespace App\Providers;

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

        Blade::component('component.motherboard',\App\View\Components\Component\Motherboard::class);
        Blade::component('component.cpu',\App\View\Components\Component\CPU::class);
        Blade::component('component.cpu-cooler',\App\View\Components\Component\CPUCooler::class);
        Blade::component('component.graphics-card',\App\View\Components\Component\GraphicsCard::class);
        Blade::component('component.ram',\App\View\Components\Component\RAM::class);
        Blade::component('component.storage',\App\View\Components\Component\Storage::class);
        Blade::component('component.psu',\App\View\Components\Component\PSU::class);
        Blade::component('component.computer-case',\App\View\Components\Component\ComputerCase::class);

        Blade::component('product.motherboard',\App\View\Components\Product\Motherboard::class);
        Blade::component('product.cpu',\App\View\Components\Product\CPU::class);
        Blade::component('product.cpu-cooler',\App\View\Components\Product\CPUCooler::class);
        Blade::component('product.graphics-card',\App\View\Components\Product\GraphicsCard::class);
        Blade::component('product.ram',\App\View\Components\Product\RAM::class);
        Blade::component('product.storage',\App\View\Components\Product\Storage::class);
        Blade::component('product.psu',\App\View\Components\Product\PSU::class);
        Blade::component('product.computer-case',\App\View\Components\Product\ComputerCase::class);
        Blade::component('product.delete-product',\App\View\Components\Product\DeleteProduct::class);

        Blade::component('order.edit-product',\App\View\Components\Order\EditProduct::class);
        Blade::component('order.delete-product',\App\View\Components\Order\DeleteProduct::class);
        Blade::component('order.accept-order',\App\View\Components\Order\AcceptOrder::class);
        Blade::component('order.cancel-order',\App\View\Components\Order\CancelOrder::class);
        Blade::component('order.done-order',\App\View\Components\Order\DoneOrder::class);

        Paginator::useBootstrap();
    }
}
