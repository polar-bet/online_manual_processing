<?php

namespace App\Http\Controllers\Admin\Example\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.example.section.create');
    }
}
