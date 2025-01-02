<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman registrasi
    function tampilRegistrasi()
    {
        return view('regist', [
            'title' => 'Register'
        ]);
    }

    // Menyimpan data registrasi
    function submitRegistrasi(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|ends_with:@uhamka.ac.id', // Validasi email dengan domain @uhamka.ac.id
            'password' => 'required|string|min:5|confirmed', // Validasi password dengan konfirmasi
        ]);

        // Menyimpan data user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Menampilkan halaman login
    function tampilLogin()
    {
        return view('login', [
            'title' => 'Login',
        ]);
    }

    // Proses login
    function submitLogin(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'email' => 'required|email|ends_with:@uhamka.ac.id', // Validasi email dengan domain @uhamka.ac.id
            'password' => 'required|string|min:5', // Validasi password
        ]);

        // Proses login menggunakan data yang telah tervalidasi
        $data = $request->only(['email', 'password']);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/posts')->with('success', 'Berhasil login!');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Proses logout
    function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
