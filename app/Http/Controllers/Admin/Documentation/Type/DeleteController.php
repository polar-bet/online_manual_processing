<?php

namespace App\Http\Controllers\Admin\Documentation\Type;

use App\Http\Controllers\Controller;
use App\Models\DocumentationType;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DocumentationType $type)
    {
        $type->delete();
        return redirect()->route('admin.documentation.type.index');
    }
}
