<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('name', $request->name)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin' => $admin]);
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Nama atau password salah!');
    }

    // Dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Logout
    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('login');
    }
}