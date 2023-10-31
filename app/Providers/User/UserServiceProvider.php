<?php

namespace App\Providers\User;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('UserService', 'App\Services\User\UserService');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
