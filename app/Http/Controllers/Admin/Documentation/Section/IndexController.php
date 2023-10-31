<?php

namespace App\Http\Controllers\Admin\Documentation\Section;

use App\Http\Controllers\Controller;
use App\Models\DocumentationSection;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.documentation.section.index', ['sections' => DocumentationSection::all()]);
    }
}
