<?php

namespace App\Http\Controllers\Admin\Documentation\Type;

use App\Http\Controllers\Controller;
use App\Models\DocumentationType;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.documentation.type.index', ['types' => DocumentationType::all()]);
    }
}
