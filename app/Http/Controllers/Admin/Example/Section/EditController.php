<?php

namespace App\Http\Controllers\Admin\Example\Section;

use App\Http\Controllers\Controller;
use App\Models\ExampleSection;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ExampleSection $section)
    {
        return view('admin.example.section.edit', ['section' => $section]);
    }
}
