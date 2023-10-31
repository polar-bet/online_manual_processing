<?php

namespace App\Http\Controllers\Forum\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\StoreRequest;
use App\Models\Theme;
use App\Models\ThemeReply;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $content = $data['description'];
        unset($data['description']);
        $data = [
            'title' => $data['title'],
            'user_id' => auth()->user()->id,
        ];
        $theme = Theme::create($data);
        $reply = [
            'theme_id' => $theme->id,
            'user_id' => auth()->user()->id,
            'content' => $content,
        ];
        ThemeReply::create($reply);
        return redirect()->route('forum.theme.index');
    }
}
