<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SignController extends Controller
{
    public function sign(Request $request){

        $formFields = $request->only(['email','password']);
        if(Auth::check()){
            return redirect()->intended(route('user.office'));           
        }
        if(Auth::attempt($formFields)){
            return redirect()->intended(route('user.office'));
        }
        return redirect(route('user.sign'))->withErrors(['email' => 'Неверный логин или пароль']);

    }
}
