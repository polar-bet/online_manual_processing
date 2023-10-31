<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Role $role)
    {
        if ($role->user->count() > 0) {
            return redirect()->route('admin.role.index')->with('error', 'неможливо видалити роль так як вона належить певному користувачу');
        }
        else {
            $role->delete();
            return redirect()->route('admin.role.index');
        }
    }
}
