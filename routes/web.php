<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[UserController::class,'register'])->name('register');

Route::post('/registered',[UserController::class,'registered'])->name('registered');
