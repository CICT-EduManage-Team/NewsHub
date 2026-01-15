<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function logged(Request $request)
    {
        $user=$request->validate([
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ]);
        if(Auth::attempt($user)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email'=>'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function registered(Request $request)
    {
        $user=$request->validate([
            'name'=>'required|min:3|max:50',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20|confirmed'
        ]);
        $user['password']=bcrypt($user['password']);
        User::create($user);
        Auth::login(User::where('email',$user['email'])->first());
        return redirect('/');
    }
}
