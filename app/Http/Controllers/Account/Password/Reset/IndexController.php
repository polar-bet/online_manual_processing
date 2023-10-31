<?php

namespace App\Http\Controllers\Account\Password\Reset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($token)
    {
        return view('account.password.reset.index', ['token' => $token]);
    }
}
