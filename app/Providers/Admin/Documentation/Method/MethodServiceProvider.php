<?php

namespace App\Providers\Admin\Documentation\Method;

use Illuminate\Support\ServiceProvider;

class MethodServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('MethodService', 'App\Services\Admin\Documentation\Method\MethodService');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
