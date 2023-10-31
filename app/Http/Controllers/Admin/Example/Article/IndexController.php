<?php

namespace App\Http\Controllers\Admin\Example\Article;

use App\Http\Controllers\Controller;
use App\Models\DocumentationArticle;
use App\Models\ExampleArticle;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.example.article.index');
    }
}
