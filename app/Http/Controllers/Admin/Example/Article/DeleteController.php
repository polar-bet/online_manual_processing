<?php

namespace App\Http\Controllers\Admin\Example\Article;

use App\Http\Controllers\Controller;
use App\Models\ExampleArticle;
use App\Services\Admin\Example\Article\Facades\ArticleService;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ExampleArticle $article)
    {
        ArticleService::delete($article);
        $article->delete();
        return redirect()->route('admin.example.article.index');
    }
}
