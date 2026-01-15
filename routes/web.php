<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
Route::get('/', function () {
    $users = \App\Models\User::withCount('news')
        ->orderByDesc('news_count')
        ->get();
    return view('index', compact('users'));
});

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/logged',[UserController::class,'logged'])->name('logged');
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/registered',[UserController::class,'registered'])->name('registered');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('profile/{id}',[UserController::class,'profile'])->name('profile');

Route::resource('news',NewsController::class);
Route::post('/tinymce/upload', [NewsController::class, 'upload'])->name('tinymce.upload');

Route::post('/comments/store',[CommentController::class,'store'])->name('comments.store');
