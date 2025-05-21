<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari admin di tabel users berdasarkan username
        $admin = DB::table('users')->where('username', $request->username)->first();
        // Jika ketemu dan password cocok (asumsi di db password sudah di-hash)
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Set session login admin
            $request->session()->put('admin_logged_in', true);
            $request->session()->put('admin_username', $admin->username);
            $request->session()->put('admin_id', $admin->id);

            // Tambahkan pesan sukses di session
            //$request->session()->flash('success', 'Selamat datang, ' . $admin->username . '!');
            
            return redirect()->route('admin.dashboard');
        }

        //if ($admin && $admin->password === $request->password) {
        //session(['admin_id' => $admin->id]);
        //return redirect()->route('admin.dashboard');
        //}

        return redirect()->route('admin.login')->with('error', 'Username atau password salah');
    }

     // Tampilkan dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['admin_logged_in', 'admin_username', 'admin_id']);
        $request->session()->flush();

        // Tambahkan pesan info di session setelah logout
        return redirect()->route('admin.login')->with('success', 'Anda telah logout');
    }
}