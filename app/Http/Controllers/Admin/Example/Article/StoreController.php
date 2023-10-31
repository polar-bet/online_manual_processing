<?php

namespace App\Http\Controllers\Admin\Example\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Example\Article\StoreRequest;
use App\Models\ExampleArticle;
use App\Services\Admin\Example\Article\Facades\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['image'] = '/storage/' . Storage::disk('public')->put('/images', $data['image']);

        $exampleArticle = ExampleArticle::create([
            'example_type_id' => $data['example_type_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'example' => $data['example'],
            'image' => $data['image'],
        ]);

        ArticleService::create($data, $exampleArticle);

        return redirect()->route('admin.example.article.index');
    }
}
