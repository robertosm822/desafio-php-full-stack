<?php

namespace App\Providers;

use App\Repositories\Products\ProductRepository;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        return [ProductRepositoryInterface::class];
    }
}
