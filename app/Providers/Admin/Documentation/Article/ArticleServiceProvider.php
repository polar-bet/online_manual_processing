<?php

namespace App\Providers\Admin\Documentation\Article;

use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('ArticleService', 'App\Services\Admin\Documentation\Article\ArticleService');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
