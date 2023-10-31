<?php

namespace App\Providers\Admin\Example\Article;

use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('ExampleArticleService', 'App\Services\Admin\Example\Article\ArticleService');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
