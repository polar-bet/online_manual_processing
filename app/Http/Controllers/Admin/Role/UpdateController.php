<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\UpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Role $role, UpdateRequest $request)
    {
        $data = $request->validated();
        $role->update($data);
        return redirect()->route('admin.role.index');
    }
}
