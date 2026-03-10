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
    $totalDevices  = \App\Models\Device::count();
    $totalParents  = \DB::table('parents')->count();
    $totalPurchase = \DB::table('purchase')->count();
    $totalServis   = \DB::table('service_log')->where('service_status', '!=', 'done')->count();

    return view('admin.dashboard', compact(
        'totalDevices',
        'totalParents',
        'totalPurchase',
        'totalServis'
    ));
}

    // Logout
    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('login');
    }
}