<?php

namespace App\Http\Controllers\Admin\Documentation\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.documentation.section.create');
    }
}
