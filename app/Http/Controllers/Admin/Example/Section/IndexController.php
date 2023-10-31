<?php

namespace App\Http\Controllers\Admin\Example\Section;

use App\Http\Controllers\Controller;
use App\Models\ExampleSection;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.example.section.index', ['sections' => ExampleSection::all()]);
    }
}
