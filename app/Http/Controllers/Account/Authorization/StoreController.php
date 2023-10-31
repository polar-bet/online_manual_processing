<?php

namespace App\Http\Controllers\Account\Authorization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\Authorization\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if(isset($data['remember']) && !empty($data['remember'])){
            setcookie('email', $data['email'],time()+3600);
            setcookie('password', $data['password'],time()+3600);
        }else{
            setcookie('email','');
            setcookie('password','');
        }
        unset($data['remember']);
        if (auth("web")->attempt($data)) {
            return redirect(route("user-office.index"));
        }
        return redirect(route("account.index"))->withErrors(["email" => "Користувач не знайдений, або дані введені неправильно"]);
    }
}
