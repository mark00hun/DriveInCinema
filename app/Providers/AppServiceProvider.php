<?php

namespace App\Providers;

use App\Repositories\MovieRepository;
use App\Repositories\RepositoryInterface;
use App\Repositories\ScreeningRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RepositoryInterface::class, MovieRepository::class);
        $this->app->bind(RepositoryInterface::class, ScreeningRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
