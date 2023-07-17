<?php

namespace App\Providers;

use App\Repositories\ComplaintsRepository;
use App\Repositories\GoogleAuthRepository;
use App\Repositories\Interfaces\ComplaintsRepositoryInterface;
use App\Repositories\Interfaces\GoogleAuthRepositoryInterface;
use App\Repositories\Interfaces\PasteBlocksRepositoryInterface;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\PasteBlocksRepository;
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

        $this->app->bind(
            ComplaintsRepositoryInterface::class,
            ComplaintsRepository::class
        );

        $this->app->bind(
            PasteBlocksRepositoryInterface::class,
            PasteBlocksRepository::class
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
