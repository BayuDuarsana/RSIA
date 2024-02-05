<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Memproses login
    // public function login(Request $request)
    // {
    //     // Validasi input sesuai kebutuhan
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);

    //     // Coba melakukan login
    //     $credentials = $request->only('username', 'password');
    //     if (Auth::attempt($credentials)) {
    //         // Jika login berhasil, redirect ke halaman dashboard atau halaman yang diinginkan
    //         return redirect()->route('dashboard');
    //     }

    //     // Jika login gagal, kembali ke halaman login dengan pesan error
    //     return redirect()->route('login')->with('error', 'Login failed. Please check your credentials.');
    // }

    public function login() {
        return view('/login');
    }
    public function loginproses(Request $request) {
        if(Auth::attempt($request->only('username', 'password'))) {
            return redirect('/welcome');
        }

        return \redirect('login');
    }

    // Logout pengguna
    public function logout()
    {
        Auth::logout();

        // Redirect ke halaman login setelah logout
        return redirect()->route('login');
    }
}
