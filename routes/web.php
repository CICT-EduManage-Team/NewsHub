<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/logged',[UserController::class,'logged'])->name('logged');
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/registered',[UserController::class,'registered'])->name('registered');

Route::resource('news',NewsController::class);
Route::post('/tinymce/upload', [NewsController::class, 'upload'])->name('tinymce.upload');
