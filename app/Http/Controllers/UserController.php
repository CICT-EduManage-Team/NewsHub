<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registered($request)
    {
        // Логика обработки регистрации пользователя


    }
}
