<?php

namespace App\Http\Controllers\Account\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\Registration\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        if (isset($data['avatar'])) {
            $data['avatar'] = '/storage/' . Storage::disk('public')->put('/user-images', $data['avatar']);
        }
        $user = User::create($data);
        if ($user) {
            auth("web")->login($user);
        }
        return redirect()->route('user-office.index');
    }
}
