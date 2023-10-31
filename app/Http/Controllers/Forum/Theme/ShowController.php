<?php

namespace App\Http\Controllers\Forum\Theme;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Theme $theme)
    {
        return view('forum.show', ['theme' => $theme]);
    }
}
