<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use App\Models\DocumentationArticle;
use App\Models\ExampleArticle;
use App\Models\ExampleSection;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('example.index', ['sections' => ExampleSection::all()]);
    }
}
