<?php

namespace App\Services\Admin\Documentation\Method;

use App\Models\DocumentationConstructor;
use App\Models\DocumentationExample;
use App\Models\DocumentationMethod;
use App\Models\DocumentationMethodParameter;
use App\Models\DocumentationMethodRelated;
use App\Models\DocumentationParameter;
use App\Models\DocumentationRelatedClass;
use App\Models\DocumentationSyntax;

class MethodService
{
    public function delete($method): void
    {
        $method->documentationMethodParameter()->count() > 0 ? $method->documentationMethodParameter()->delete() : null;
        $method->documentationMethodRelated()->count() > 0 ? $method->documentationMethodRelated()->delete() : null;
    }

    public function create($data, $method): void
    {
        if (isset($data['parameters'])) {
            foreach ($data['parameters'] as $parameter) {
                DocumentationMethodParameter::create([
                    'documentation_method_id' => $method->id,
                    'name' => $parameter['name'],
                    'type' => $parameter['type'],
                    'description' => $parameter['description'],
                ]);
            }
        }

        if (isset($data['related_method_id'])) {
            foreach ($data['related_method_id'] as $relatedMethodId) {
                DocumentationMethodRelated::create([
                    'documentation_method_id' => $method->id,
                    'related_method_id' => $relatedMethodId,
                ]);
            }
        }
    }

}
