<?php

namespace App\Http\Controllers\Admin\Documentation\Section;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Documentation\Section\StoreRequest;
use App\Models\DocumentationSection;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        DocumentationSection::create($data);
        return redirect()->route('admin.documentation.section.index');
    }
}
