<?php

namespace App\Http\Controllers\Admin\Example\Type;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Example\Type\UpdateRequest;
use App\Models\ExampleType;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, ExampleType $type)
    {
        $data = $request->validated();
        $type->update($data);
        return redirect()->route('admin.example.type.index');
    }
}
