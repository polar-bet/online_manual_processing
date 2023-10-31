<?php

namespace App\Http\Controllers\Admin\Example\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Example\Article\UpdateRequest;
use App\Models\ExampleArticle;
use App\Models\ExampleFeaturedFunction;
use App\Services\Admin\Example\Article\Facades\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, ExampleArticle $article)
    {
        $data = $request->validated();

        if (isset($data['image'])) {
            $data['image'] = '/storage/' . Storage::disk('public')->put('/images', $data['image']);
            $article->update(['image' => $data['image']]);
        }
        $article->update([
            'example_type_id' => $data['example_type_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'example' => $data['example'],
        ]);

        ArticleService::delete($article);

        ArticleService::create($data, $article);

        return redirect()->route('admin.example.article.show', $article->id);
    }
}
