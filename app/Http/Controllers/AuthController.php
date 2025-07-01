<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function loginForm()
    {
        return view('login'); // Pastikan file ini ada: resources/views/login.blade.php
    }

    /**
     * Proses login pengguna.
     */
    public function login(Request $request): RedirectResponse
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba autentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Hindari session fixation
            return redirect('/')->with('success', 'Login berhasil, selamat datang ');
        }

        // Gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout pengguna.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout(); // Keluar dari sesi

        $request->session()->invalidate();       // Hapus session
        $request->session()->regenerateToken();  // Regenerasi token CSRF

        return redirect('/')->with('success', 'Berhasil logout.');
    }
}
