<?php

namespace App\Http\Controllers\Admin\Documentation\Article;

use App\Http\Controllers\Controller;
use App\Models\DocumentationArticle;
use App\Services\Admin\Documentation\Article\Facades\ArticleService;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DocumentationArticle $article)
    {

        ArticleService::delete($article);
        $article->delete();

        return redirect()->route('admin.documentation.article.index');
    }
}
