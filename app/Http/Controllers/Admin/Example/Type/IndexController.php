<?php

namespace App\Http\Controllers\Admin\Example\Type;

use App\Http\Controllers\Controller;
use App\Models\ExampleType;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.example.type.index', ['types' => ExampleType::all()]);
    }
}
