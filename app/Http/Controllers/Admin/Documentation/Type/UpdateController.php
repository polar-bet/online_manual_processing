<?php

namespace App\Http\Controllers\Admin\Documentation\Type;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Documentation\Type\UpdateRequest;
use App\Models\DocumentationType;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, DocumentationType $type)
    {
        $data = $request->validated();
        $type->update($data);
        return redirect()->route('admin.documentation.type.index');
    }
}
