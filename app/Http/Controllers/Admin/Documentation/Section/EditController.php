<?php

namespace App\Http\Controllers\Admin\Documentation\Section;

use App\Http\Controllers\Controller;
use App\Models\DocumentationSection;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DocumentationSection $section)
    {
        return view('admin.documentation.section.edit', ['section' => $section]);
    }
}
