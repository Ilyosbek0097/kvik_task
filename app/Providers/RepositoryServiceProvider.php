<?php

namespace App\Providers;

use App\Repositories\CustomerRepository;
use App\Repositories\Interfaces\CustomerRepositoryInterfaces;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CustomerRepositoryInterfaces::class, CustomerRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
