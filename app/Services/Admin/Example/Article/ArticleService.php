<?php

namespace App\Services\Admin\Example\Article;

use App\Models\ExampleFeaturedFunction;
use App\Models\ExampleRelated;

class ArticleService
{
    public function delete($article): void
    {
        $article->exampleFeaturedFunction()->count() > 0 ? $article->exampleFeaturedFunction()->delete() : null;
    }

    public function create($data, $article): void
    {
        if (isset($data['featured_functions_id'])) {
            foreach ($data['featured_functions_id'] as $featuredFunction) {
                ExampleFeaturedFunction::create([
                    'example_article_id' => $article->id,
                    'documentation_article_id' => $featuredFunction,
                ]);
            }
        }
    }
}
