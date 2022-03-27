<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
class SignUpController extends Controller
{
    public function save(Request $request){

        if(Auth::check()){
            return redirect(route('user.office'));
        }
        $password = $request->input('password');
        $password2 = $request->input('password2');
        if($password===$password2){
        $validateFields = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'name' => 'required'

        ]);
        }
        else{
        return redirect(route('user.signup'))->withErrors(['password' => 'Пароли не совпадают']);

        }
        if(User::where('email',$validateFields['email'])->exists()){
            return redirect(route('user.signup'))->withErrors(['email' => 'Такой пользователь уже зарегистрирован']);
        }
        $user = User::create($validateFields);
        if($user)
        {
            Auth::login($user);
            return redirect(route('user.office'));
        }

            return redirect(route('user.office')->withErrors(['formError' => 'Произошла ошибка']));

    }
}
