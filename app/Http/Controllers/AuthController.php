<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RT;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email', // Pastikan email memiliki format valid
            'password' => 'required|min:6', // Password harus memiliki minimal 6 karakter
        ]);

        // Ambil data email & password dari input
        $credentials = $request->only('email', 'password');

        // Cek autentikasi menggunakan data yang diberikan
        if (Auth::attempt($credentials)) {
            // Simpan data user yang login
            $user = Auth::user();

            // Arahkan pengguna sesuai role
            switch ($user->role_id) {
                case 1: // Role Admin
                    return redirect()->intended('dashboardAdmin');
                case 2: // Role Approval
                    return redirect()->intended('dashboardApproval');
                default:
                    return redirect()->intended('/')->with('status', 'Role tidak dikenali.');
            }
        }

        // Jika autentikasi gagal, kembali ke halaman login dengan error
        return redirect('/')
            ->withInput()
            ->withErrors(['login_gagal' => 'Email atau password yang dimasukkan salah.']);
    }



    public function logout(Request $request)
    {
        // Logout harus menghapus session
        $request->session()->flush();

        // Jalankan juga fungsi logout pada auth
        Auth::logout();

        // Kembali ke halaman login
        return Redirect('login');
    }
}
