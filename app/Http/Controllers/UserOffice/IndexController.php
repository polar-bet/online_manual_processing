<?php

namespace App\Http\Controllers\UserOffice;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('user-office.index', ['user' => auth()->user(), 'roles' => Role::all()]);
    }
}
