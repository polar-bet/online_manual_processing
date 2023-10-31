<?php

namespace App\Http\Controllers\Admin\Documentation\Type;

use App\Http\Controllers\Controller;
use App\Models\DocumentationSection;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.documentation.type.create', ['sections' => DocumentationSection::all()]);
    }
}
