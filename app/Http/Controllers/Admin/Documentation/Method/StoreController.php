<?php

namespace App\Http\Controllers\Admin\Documentation\Method;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Documentation\Method\StoreRequest;
use App\Models\DocumentationMethod;
use App\Services\Admin\Documentation\Method\Facades\MethodService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $syntaxRow = '';
        foreach ($data['syntaxes'] as $key => $syntax) {
            $syntaxRow .= $syntax . (array_key_last($data['syntaxes']) != $key ? '|' : null);
        }

        $method = DocumentationMethod::create([
            'documentation_article_id' => $data['documentation_article_id'],
            'name' => $data['name'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'return' => $data['return'],
            'example' => $data['example'],
            'syntax' => $syntaxRow,
        ]);

        MethodService::create($data, $method);

        return redirect()->route('admin.documentation.method.index');

    }
}
