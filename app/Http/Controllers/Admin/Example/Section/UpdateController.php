<?php

namespace App\Http\Controllers\Admin\Example\Section;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Example\Section\UpdateRequest;
use App\Models\ExampleSection;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, ExampleSection $section)
    {
        $data = $request->validated();
        $section->update($data);
        return redirect()->route('admin.example.section.index');
    }
}
