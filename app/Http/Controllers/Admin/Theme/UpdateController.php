<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Theme\UpdateRequest;
use App\Models\Theme;
use App\Models\ThemeReply;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Theme $theme)
    {
        $data = $request->validated();
        $content = $data['description'];
        unset($data['description']);
        $theme->update($data);
        $reply = [
            'theme_id' => $theme->id,
            'user_id' => $theme->user->id,
            'content' => $content,
        ];
        $theme->themeReply->first()->update($reply);
        return redirect()->route('admin.theme.index');
    }
}
