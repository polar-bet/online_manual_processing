<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentationArticle;
use App\Models\DocumentationClass;
use App\Models\ExampleArticle;
use App\Models\ExampleClass;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.index', ['users' => User::all(), 'themes' => Theme::all(), 'documentationClasses' => DocumentationArticle::all(), 'exampleClasses' => ExampleArticle::all()]);
    }
}
