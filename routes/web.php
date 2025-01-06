<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;




Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/posts', PostController::class)->except(['create', 'edit']);
});


Route::resource('posts', PostController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/about', function () {
        return view('about');
    });
    Route::resource('posts', PostController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

//login
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'tampilRegistrasi']);
    Route::post('/register/submit', [AuthController::class, 'submitRegistrasi']);

    Route::get('/login', [AuthController::class, 'tampilLogin']);
    Route::post('/login/submit', [AuthController::class, 'submitLogin']);
});
