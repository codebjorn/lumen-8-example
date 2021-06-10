<?php

namespace App\Providers;

use App\Memoji\MemojiRepository;
use App\Memoji\MemojiRepositoryFactory;
use Illuminate\Support\ServiceProvider;

class MemojiServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MemojiRepository::class, function () {
            return MemojiRepositoryFactory::make(
                path: config('memoji.path'),
                men: config('memoji.men'),
                women: config('memoji.women')
            );
        });
    }
}
