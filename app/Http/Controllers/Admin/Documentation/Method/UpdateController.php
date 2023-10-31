<?php

namespace App\Http\Controllers\Admin\Documentation\Method;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Documentation\Method\UpdateRequest;
use App\Models\DocumentationMethod;
use App\Services\Admin\Documentation\Method\Facades\MethodService;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, DocumentationMethod $method)
    {
        $data = $request->validated();
        MethodService::delete($method);
        MethodService::create($data, $method);
        return redirect()->route('admin.documentation.method.show', $method->id);
    }
}
