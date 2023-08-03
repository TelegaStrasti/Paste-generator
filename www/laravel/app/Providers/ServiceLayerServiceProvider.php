<?php

namespace App\Providers;

use App\Services\Auth\GoogleAuthService;
use App\Services\Auth\UserAuthService;
use App\Services\ComplaintService;
use App\Services\interfaces\Auth\GoogleAuthServiceInterface;
use App\Services\interfaces\Auth\UserAuthServiceInterface;
use App\Services\interfaces\ComplaintServiceInterface;
use App\Services\interfaces\PasteServiceInterface;
use App\Services\interfaces\UserServiceInterface;
use App\Services\PasteService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class ServiceLayerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ComplaintServiceInterface::class,
            ComplaintService::class
        );

        $this->app->bind(
            PasteServiceInterface::class,
            PasteService::class
        );

        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );

        $this->app->bind(
            GoogleAuthServiceInterface::class,
            GoogleAuthService::class
        );

        $this->app->bind(
            UserAuthServiceInterface::class,
            UserAuthService::class
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
