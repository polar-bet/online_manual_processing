<?php

namespace App\Http\Controllers\Admin\Example\Type;

use App\Http\Controllers\Controller;
use App\Models\DocumentationType;
use App\Models\ExampleSection;
use App\Models\ExampleType;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.example.type.create', ['sections' => ExampleSection::all()]);
    }
}
