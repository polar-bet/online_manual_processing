<?php

namespace App\Http\Controllers\Admin\Documentation\Article;

use App\Http\Controllers\Controller;
use App\Models\DocumentationArticle;
use App\Models\DocumentationMethod;
use App\Models\DocumentationRelatedClass;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DocumentationArticle $article)
    {
        $relatedClasses = DocumentationArticle::whereIn('id', DocumentationRelatedClass::where('documentation_article_id', $article->id)->pluck('related_class_id'))->get();
        return view('admin.documentation.article.show', ['article' => $article, 'relatedClasses' => $relatedClasses]);
    }
}
