<?php

namespace App\Http\Controllers\Admin\Example\Section;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Example\Section\StoreRequest;
use App\Models\ExampleSection;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request, ExampleSection $section)
    {
        $data = $request->validated();
        ExampleSection::create($data);
        return redirect()->route('admin.example.section.index');
    }
}
