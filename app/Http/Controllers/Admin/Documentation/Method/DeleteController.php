<?php

namespace App\Http\Controllers\Admin\Documentation\Method;

use App\Http\Controllers\Controller;
use App\Models\DocumentationMethod;
use App\Services\Admin\Documentation\Method\Facades\MethodService;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DocumentationMethod $method)
    {
        MethodService::delete($method);
        $method->delete();
        return redirect()->route('admin.documentation.method.index');
    }
}
