<?php

namespace App\Http\Controllers\Admin\Documentation\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Documentation\Article\StoreRequest;
use App\Models\DocumentationArticle;
use App\Services\Admin\Documentation\Article\Facades\ArticleService;


class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $article = DocumentationArticle::create([
            'documentation_type_id' => $data['documentation_type_id'],
            'name' => $data['name'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'return' => $data['return'],
        ]);

        ArticleService::create($data, $article);

        return redirect()->route('admin.documentation.article.index');
    }
}
