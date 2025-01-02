<?php

use App\Models\Post;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('home', ["nama" => "Jumsky"]);
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/posts', function () {
    return view('posts', ["title" => "Postingan", "posts" => Post::all()]);
});


//login

Route::get('/register', [AuthController::class, 'tampilRegistrasi']);
Route::post('/register/submit', [AuthController::class, 'submitRegistrasi']);

Route::get('/login', [AuthController::class, 'tampilLogin']);
Route::post('/login/submit', [AuthController::class, 'submitLogin']);

Route::post('/logout', [AuthController::class, 'logout']);
