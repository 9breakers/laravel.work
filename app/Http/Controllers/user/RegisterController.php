<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show(){
        return view('user.registration');
    }

    public function create(RegisterRequest $request){

        $users= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        Auth::login($users);

        return redirect('/');
    }


}
