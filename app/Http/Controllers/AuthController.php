<?php

namespace App\Http\Controllers;

use App\Models\UserLogin;  // Menggunakan model UserLogin
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('loginPage');
    }

    // Menangani login
    public function login(Request $request)
    {
        // Validasi input email dan password
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Mencari UserLogin berdasarkan email (di tabel 'users')
        $userLogin = UserLogin::where('email', $request->email)->first();

        // Jika UserLogin ditemukan dan password valid
        if ($userLogin && Hash::check($request->password, $userLogin->password)) {
            Auth::login($userLogin);  // Login menggunakan model UserLogin

            // Ambil data user terkait, langsung dari model UserLogin yang mewakili tabel 'users'
            $user = $userLogin;  // Langsung pakai data dari $userLogin

            // Menyimpan user dalam session
            session(['user' => $user]);

            // Redirect berdasarkan domain email atau role_id
            if (strpos($user->email, '@admin.ac.id') !== false || $user->role_id == 1) {
                // Jika email berakhiran @admin.ac.id atau role_id adalah 1, redirect ke dashboard admin
                return redirect()->route('admin.dashboard');
            } else {
                // Selain itu, redirect ke dashboard user
                return redirect()->route('user.dashboard');
            }
        }

        // Jika login gagal, redirect kembali ke halaman login dengan error
        return redirect()->route('login.form')->withErrors(['errorMessage' => 'Invalid email or password.']);
    }

    // Menangani logout
    // public function logout()
    // {
    //     Auth::logout();
    //     session()->flush();
    //     return redirect()->route('login.form');
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return response()->json([
            'status' => 'success',
            'redirect' => '/LoginPage'
        ]);
    }

    
}
