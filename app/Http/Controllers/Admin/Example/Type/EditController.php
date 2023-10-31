<?php

namespace App\Http\Controllers\Admin\Example\Type;

use App\Http\Controllers\Controller;
use App\Models\ExampleSection;
use App\Models\ExampleType;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ExampleType $type)
    {
        return view('admin.example.type.edit', ['type' => $type, 'sections' => ExampleSection::all()]);
    }
}
