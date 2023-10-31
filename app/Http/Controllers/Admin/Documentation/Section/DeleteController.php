<?php

namespace App\Http\Controllers\Admin\Documentation\Section;

use App\Http\Controllers\Controller;
use App\Models\DocumentationSection;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DocumentationSection $section)
    {
        $section->delete();
        return redirect()->route('admin.documentation.section.index');
    }
}
