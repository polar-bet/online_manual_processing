<?php

namespace App\Http\Controllers\Account\Password\Forgot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\Password\Forget\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $token = \Illuminate\Support\Str::random(64);
        $data = $request->validated();
        DB::table("password_reset_tokens")->insert([
            "email" => $data['email'],
            "token" => $token,
            "created_at" => Carbon::now(),
        ]);

        Mail::send("account.password.message.index", ['token' => $token], function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject("Відновлення паролю");
        });

        return redirect()->route('account.index')->with('message', 'Ми надіслали вам на електронну пошту посилання для відновлення паролю!');
    }
}
