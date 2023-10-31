<?php

namespace App\Http\Controllers\Admin\Documentation\Method;

use App\Http\Controllers\Controller;
use App\Models\DocumentationArticle;
use App\Models\DocumentationMethod;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       return view('admin.documentation.method.create', ['articles' => DocumentationArticle::all(), 'methods' => DocumentationMethod::all()]);
    }
}
