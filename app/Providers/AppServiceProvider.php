<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\TodoRepositoryInterface;
use App\Repositories\TodoRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(
            \App\Interface\TodoRepositoryInterface::class,
            \App\Repositories\TodoRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
