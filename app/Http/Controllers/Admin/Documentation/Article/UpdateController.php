<?php

namespace App\Http\Controllers\Admin\Documentation\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Documentation\Article\UpdateRequest;
use App\Models\DocumentationArticle;
use App\Services\Admin\Documentation\Article\Facades\ArticleService;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, DocumentationArticle $article)
    {
        $data = $request->validated();
        $article->update([
            'documentation_type_id' => $data['documentation_type_id'],
            'name' => $data['name'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'return' => $data['return'],
        ]);

        ArticleService::delete($article);

        ArticleService::create($data, $article);

        return redirect()->route('admin.documentation.article.show', $article->id);
    }
}
