<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\DocumentationSection;
use App\Models\Role;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('admin.role.index', ['roles' => Role::all()]);
    }
}
