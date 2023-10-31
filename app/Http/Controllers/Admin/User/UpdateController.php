<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        if (!isset($data['avatar'])) {
        } else {
            $data['avatar'] = '/storage/' . Storage::disk('public')->put('/user-images', $data['avatar']);
        }
        $user->update($data);
        return redirect()->route('admin.user.index');
    }
}
