<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    public function index()
    {
        if (!Auth::check()) {
            return view('pages.login');
        }else{
            return redirect()->intended('dashboard');
        }
    }

    public function register()
    {
        return view('pages.register');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        // Proses autentikasi
        if (Auth::attempt($credentials)) {
            // regenerate session untuk keamanan (session fixation)
            $request->session()->regenerate();

            return redirect()->intended('dashboard')
                ->with('success', 'Login berhasil!');
        }

        // Jika gagal, kembalikan ke form login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
