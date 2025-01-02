<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController
{
    public function index()
    {
        return view('regist', [
            'title' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email:dns',
                'unique:users',
                function ($attribute, $value, $fail) {
                    if (!str_ends_with($value, '@uhamka.ac.id')) {
                        $fail('Email harus menggunakan domain @uhamka.ac.id.');
                    }
                },
            ],
            'password' => 'required|min:5|max:255'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }
}
