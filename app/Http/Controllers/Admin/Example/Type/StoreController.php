<?php

namespace App\Http\Controllers\Admin\Example\Type;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Example\Type\StoreRequest;
use App\Models\ExampleType;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        ExampleType::create($data);
        return redirect()->route('admin.example.type.index');
    }
}
