<?php

namespace App\Http\Controllers\Admin\Example\Section;

use App\Http\Controllers\Controller;
use App\Models\ExampleSection;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ExampleSection $section)
    {
        $section->delete();
        return redirect()->route('admin.example.section.index');
    }
}
