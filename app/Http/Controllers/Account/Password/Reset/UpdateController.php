<?php

namespace App\Http\Controllers\Account\Password\Reset;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\Password\Reset\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $updateRequest, $token)
    {
        $data = $updateRequest->validated();

        $updatePassword = DB::table("password_reset_tokens")->where([
            "email" => $data['email'],
            "token" => $token,
        ])->first();

        if (!$updatePassword) {
            return redirect()->back()->with("error", "введена не коректна електронна пошта");
        }
        $hash = Hash::make($data['password']);
        User::where("email", $data['email'])
            ->update(["password" => $hash]);

        DB::table("password_reset_tokens")->where(["email" => $data['email']])->delete();

        return redirect()->route("account.index")->with("message", "Пароль було успішно змінено");
    }
}
