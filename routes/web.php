<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ["nama" => "Jumsky"]);
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/posts', function () {
    return view('posts');
});
