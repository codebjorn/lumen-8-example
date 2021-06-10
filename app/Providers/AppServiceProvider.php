<?php

namespace App\Providers;

use Illuminate\Contracts\Routing\ResponseFactory as ResponseFactoryContract;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Http\ResponseFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ResponseFactoryContract::class, function () {
            return new ResponseFactory();
        });
    }
}
