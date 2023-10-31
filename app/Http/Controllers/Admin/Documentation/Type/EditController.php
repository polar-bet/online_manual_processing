<?php

namespace App\Http\Controllers\Admin\Documentation\Type;

use App\Http\Controllers\Controller;
use App\Models\DocumentationSection;
use App\Models\DocumentationType;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DocumentationType $type)
    {
        return view('admin.documentation.type.edit', ['type' => $type, 'sections' => DocumentationSection::all()]);
    }
}
