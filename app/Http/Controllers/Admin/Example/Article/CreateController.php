<?php

namespace App\Http\Controllers\Admin\Example\Article;

use App\Http\Controllers\Controller;
use App\Models\DocumentationArticle;
use App\Models\ExampleArticle;
use App\Models\ExampleType;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.example.article.create', ['types' => ExampleType::all(),'documentationArticles' => DocumentationArticle::all(), 'exampleArticles' => ExampleArticle::all()]);
    }
}
