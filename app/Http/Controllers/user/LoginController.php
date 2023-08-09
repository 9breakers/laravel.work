<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $credentials = ['email','password'];


    public function show(){
        return view('user.login');
    }

    public function create(LoginRequest $request){

        $remember = $request->has('remember');

        if (Auth::attempt($request->only($this->credentials), $remember)) {
            if (Auth::check() && Auth::user()->is_admin == true) {
                return redirect('/admin');

            } else {
                return redirect('/');
            }
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return back()->withErrors([
                'password' => 'Неправельний пароль'
            ]);
        } else {
            return back()->withErrors([
                'email' => 'Користувача з такою поштою не знайдено'
            ]);
        }

    }
}
