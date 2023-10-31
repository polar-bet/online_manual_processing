<?php

namespace App\Http\Controllers\Admin\Documentation\Section;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Documentation\Section\UpdateRequest;
use App\Models\DocumentationSection;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, DocumentationSection $section)
    {
        $data = $request->validated();
        $section->update($data);
        return redirect()->route('admin.documentation.section.index');
    }
}
