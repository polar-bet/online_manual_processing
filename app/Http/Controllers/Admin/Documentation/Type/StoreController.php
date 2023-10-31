<?php

namespace App\Http\Controllers\Admin\Documentation\Type;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Documentation\Type\StoreRequest;
use App\Models\DocumentationType;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        DocumentationType::create($data);
        return redirect()->route('admin.documentation.type.index');
    }
}
