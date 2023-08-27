<?php

namespace App\Providers;

use App\Interfaces\AdminInterface;
use App\Interfaces\Api\UserRepositoryInterface;
use App\Repository\Api\UserRepository as UserApiRepository;
use App\Interfaces\AuthInterface;
use App\Interfaces\DriverInterface;
use App\Interfaces\UserInterface;
use App\Repository\AdminRepository;
use App\Repository\AuthRepository;
use App\Repository\DriverRepository;
use App\Repository\UserRepository;
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
        $this->app->bind(UserInterface::class,UserRepository::class);
        $this->app->bind(AdminInterface::class,AdminRepository::class);
        $this->app->bind(DriverInterface::class,DriverRepository::class);
        $this->app->bind(AuthInterface::class,AuthRepository::class);


        //start Api classes and interfaces
        $this->app->bind(UserRepositoryInterface::class,UserApiRepository::class);

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
