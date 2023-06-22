<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ListingRepositoryInterface;
use App\Repositories\ListingRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ListingRepositoryInterface::class, ListingRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
