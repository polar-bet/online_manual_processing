<?php

namespace App\Http\Controllers\Reference\Overview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __invoke(Request $request)
    {
        return view('reference.overview.index');
    }
}
