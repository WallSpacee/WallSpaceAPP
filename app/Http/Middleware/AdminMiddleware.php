<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna terautentikasi dan memiliki peran admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        } else {
            Auth::logout();
            return redirect('/login');
        }

        // Jika bukan admin, arahkan ke halaman lain (misalnya, halaman utama)
        return redirect('/'); // Atau halaman lain yang sesuai
    }
}
