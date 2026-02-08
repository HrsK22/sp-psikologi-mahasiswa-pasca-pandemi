<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman form login.
     * Method ini akan dipanggil oleh rute GET /login.
     */
    public function showLoginForm()
    {
        $userCount = User::count();

        // Link hanya akan ditampilkan jika belum ada pengguna sama sekali (jumlah pengguna < 1).
        $showRegisterLink = ($userCount < 1);

        return view('auth.login', [
            'title' => 'Login',
            'showRegisterLink' => $showRegisterLink
        ]);
    }

    /**
     * Menangani permintaan login dari form.
     * Method ini akan dipanggil oleh rute POST /login.
     */
    public function login(Request $request)
    {
        // 1. Validasi input yang dikirim dari form.
        // Memastikan email dan password diisi dan email berformat valid.
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Mencoba untuk mengautentikasi pengguna.
        // Auth::attempt akan otomatis melakukan hashing pada password
        // dan membandingkannya dengan yang ada di database.
        if (Auth::attempt($credentials)) {
            // Jika kredensial benar dan berhasil login:
            
            // Regenerate session ID untuk mencegah session fixation attacks.
            $request->session()->regenerate();

            // Redirect pengguna ke halaman yang dituju sebelumnya,
            // atau ke halaman dashboard jika tidak ada.
            // Menggunakan nama rute 'dashboard.index' sebagai fallback
            return redirect()->intended(route('dashboard.index'))->with('success', 'Selamat datang, ' . Auth::user()->name . '!');
        }

        // 3. Jika autentikasi gagal.
        // Kembalikan pengguna ke halaman login dengan pesan error.
        // onlyInput('email') akan menjaga agar input email tidak hilang.
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Menangani proses logout pengguna.
     * Method ini akan dipanggil oleh rute POST /logout.
     */
    public function logout(Request $request)
    {
        // Logout pengguna yang sedang aktif.
        Auth::logout();

        // Invalidate session untuk memastikan semua data session dihapus.
        $request->session()->invalidate();

        // Regenerate token CSRF untuk keamanan.
        $request->session()->regenerateToken();

        // Redirect pengguna kembali ke halaman login.
        return redirect('/login');
    }
}
