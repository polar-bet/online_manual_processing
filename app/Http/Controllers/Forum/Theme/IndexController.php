<?php

namespace App\Http\Controllers\Forum\Theme;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('forum.index');
    }
}
