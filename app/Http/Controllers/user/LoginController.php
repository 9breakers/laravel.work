<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    protected $credentials = ['email','password'];


    public function show(){
        return view('auth.login');
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

    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        $user=Socialite::driver('google')->user();
        $this->regOrLogin($user);
        return redirect()->route('home');
    }

    public function regOrLogin($data){
        $user=User::where('email','=', $data->email)->first();
        if(!$user){
            return User::create([
                'name'=>$data->name,
                'email'=>$data->email,
                'password'=>bcrypt(Str::random(10))
            ]);
        }
        Auth::login($user);
        return $user;
    }

}
