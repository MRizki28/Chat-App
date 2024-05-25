<?php

namespace App\Providers;

use App\Interfaces\AuthInterfaces;
use App\Interfaces\MessageInterfaces;
use App\Repositories\AuthRepositories;
use App\Repositories\MessageRepositories;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterfaces::class, AuthRepositories::class);
        $this->app->bind(MessageInterfaces::class, MessageRepositories::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
