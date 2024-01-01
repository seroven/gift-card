<?php

namespace App\Providers;

use App\Interfaces\{
    EssentialRepositoryInterface,
    GiftCardRepositoryInterface,
    StatusRepositoryInterface,
    TokenRepositoryInterface,
    UserRepositoryInterface
};
use App\Repositories\{
    EssentialRepository,
    GiftCardRepository,
    StatusRepository,
    TokenRepository,
    UserRepository
};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EssentialRepositoryInterface::class, EssentialRepository::class);
        $this->app->bind(GiftCardRepositoryInterface::class, GiftCardRepository::class);
        $this->app->bind(StatusRepositoryInterface::class, StatusRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
