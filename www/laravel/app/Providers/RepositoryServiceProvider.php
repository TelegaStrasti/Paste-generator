<?php

namespace App\Providers;

use App\Repositories\GoogleAuthRepository;
use App\Repositories\Interfaces\GoogleAuthRepositoryInterface;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\PasteRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            PasteRepositoryInterface::class,
            PasteRepository::class
        );

        $this->app->bind(
            GoogleAuthRepositoryInterface::class,
            GoogleAuthRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
