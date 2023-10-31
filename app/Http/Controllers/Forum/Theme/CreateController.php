<?php

namespace App\Http\Controllers\Forum\Theme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('forum.create');
    }
}
