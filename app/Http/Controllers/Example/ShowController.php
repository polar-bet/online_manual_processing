<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use App\Models\ExampleArticle;
use App\Models\ExampleRelated;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ExampleArticle $article)
    {
        $relatedExamples = ExampleArticle::whereIn('id', ExampleRelated::where('example_article_id', $article->id)->pluck('related_example_id'))->get();
        return view('example.show', ['article' => $article, 'relatedExamples' => $relatedExamples]);
    }
}
