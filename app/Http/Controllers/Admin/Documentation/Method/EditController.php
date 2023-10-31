<?php

namespace App\Http\Controllers\Admin\Documentation\Method;

use App\Http\Controllers\Controller;
use App\Models\DocumentationArticle;
use App\Models\DocumentationMethod;
use App\Models\DocumentationMethodRelated;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DocumentationMethod $method)
    {
        $relatedMethods = DocumentationMethod::whereIn('id', DocumentationMethodRelated::where('documentation_method_id', $method->id)->pluck('related_method_id'))->get();
        return view('admin.documentation.method.edit', ['method' => $method, 'articles' => DocumentationArticle::all(), 'relatedMethods' => $relatedMethods, 'documentationMethods' => DocumentationMethod::all()]);
    }
}
