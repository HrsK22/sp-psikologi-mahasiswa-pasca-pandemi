<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $userCount = User::count();

        if ($userCount >= 1) {
            $this->middleware(function ($request, $next) {
                // 3. Redirect pengguna ke halaman login dengan pesan.
                return redirect('/login')->with('info', 'Akses pendaftaran ditutup. Akun Administrator sudah terdaftar.');
            });
        }
    }

    /**
     * Menampilkan halaman form registrasi.
     */
    public function showRegistrationForm()
    {
        return view('auth.register', ['title' => 'Register']);
    }

    /**
     * Menangani proses registrasi user baru.
     */
    public function register(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // 2. Buat user baru menggunakan Model User
        // Karena kita sudah mengatur 'password' => 'hashed' di Model,
        // Laravel akan otomatis melakukan hashing.
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            // id_role akan otomatis diisi dengan nilai default (1) dari migrasi
        ]);

        // 3. Setelah user berhasil dibuat, langsung loginkan
        Auth::login($user);

        // 4. Redirect ke halaman dashboard
        return redirect()->route('dashboard.index')->with('success', 'Registrasi berhasil! Selamat datang,'. ' ' . $user->name);
    }
}
