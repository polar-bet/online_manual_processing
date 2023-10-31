<?php

namespace App\Providers;

use App\Models\DocumentationArticle;
use App\Models\DocumentationClass;
use App\Models\DocumentationMethod;
use App\Models\DocumentationSection;
use App\Models\DocumentationType;
use App\Models\ExampleArticle;
use App\Models\ExampleClass;
use App\Models\ExampleType;
use App\Models\ExampleSection;
use App\Models\Role;
use App\Models\Theme;
use App\Models\User;
use App\View\Composers\AppComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('admin.includes.sidebar', function ($view) {
            $view->with(['user' => User::all(),
                'theme' => Theme::all(),
                'role' => Role::all(),
                'documentationArticle' => DocumentationArticle::all(),
                'documentationType' => DocumentationType::all(),
                'documentationSection' => DocumentationSection::all(),
                'documentationMethod' => DocumentationMethod::all(),
                'exampleArticle' => ExampleArticle::all(),
                'exampleType' => ExampleType::all(),
                'exampleSection' => ExampleSection::all(),
            ]);
        });
        View::composer('documentation.sidebar.index', function ($view) {
            $view->with(['sections' => DocumentationSection::orderBy('name')->get()]);
        });
    }
}
