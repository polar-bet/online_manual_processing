<?php

namespace App\Http\Controllers\Admin\Example\Type;

use App\Http\Controllers\Controller;
use App\Models\ExampleType;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ExampleType $type)
    {
        $type->delete();
        return redirect()->route('admin.example.type.index');
    }
}
