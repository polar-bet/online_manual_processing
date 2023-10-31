<?php

namespace App\Services\Admin\Documentation\Article;

use App\Models\DocumentationConstructor;
use App\Models\DocumentationExample;
use App\Models\DocumentationParameter;
use App\Models\DocumentationRelatedClass;
use App\Models\DocumentationSyntax;

class ArticleService
{
    public function delete($article): void
    {
        $article->example()->count() > 0 ? $article->example()->delete() : null;
        $article->documentationComment()->count() > 0 ? $article->documentationComment()->delete() : null;
        $article->documentationConstructor()->count() > 0 ? $article->documentationConstructor()->delete() : null;
        $article->documentationMethod()->count() > 0 ? $article->documentationMethod()->delete() : null;
        $article->documentationParameter()->count() > 0 ? $article->documentationParameter()->delete() : null;
        $article->documentationRelatedClass()->count() > 0 ? $article->documentationRelatedClass()->delete() : null;
        $article->documentationSyntax()->count() > 0 ? $article->documentationSyntax()->delete() : null;
    }

    public function create($data, $article): void
    {
        if (isset($data['examples'])) {
            foreach ($data['examples'] as $example) {
                DocumentationExample::create([
                    'documentation_article_id' => $article->id,
                    'example' => $example,
                ]);
            }
        }
        if (isset($data['syntaxes'])) {
            foreach ($data['syntaxes'] as $syntax) {
                DocumentationSyntax::create([
                    'documentation_article_id' => $article->id,
                    'syntax' => $syntax,
                ]);
            }
        }
        if (isset($data['constructors'])) {
            foreach ($data['constructors'] as $constructor) {
                DocumentationConstructor::create([
                    'documentation_article_id' => $article->id,
                    'name' => $constructor,
                ]);
            }
        }
        if (isset($data['parameters'])) {
            foreach ($data['parameters'] as $parameter) {
                DocumentationParameter::create([
                    'documentation_article_id' => $article->id,
                    'name' => $parameter['name'],
                    'type' => $parameter['type'],
                    'description' => $parameter['description'],
                ]);
            }
        }

        if (isset($data['related_class_id'])) {
            foreach ($data['related_class_id'] as $classId) {
                DocumentationRelatedClass::create([
                    'documentation_article_id' => $article->id,
                    'related_class_id' => $classId,
                ]);
            }
        }
    }

}
