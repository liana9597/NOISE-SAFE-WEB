@extends('admin.layouts.app')

@section('title', 'Dashboard — Noise Safe')

@section('content')

<div class="topbar">
    <div>
        <h2>Dashboard</h2>
        <p>Selamat datang kembali, {{ session('admin')->name }}! 👋</p>
    </div>
    <div class="date-badge">📅 {{ now()->translatedFormat('d F Y') }}</div>
</div>

<!-- Stat Cards -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:24px">
    <div class="card" style="border-top:3px solid #8DBED7">
        <div style="width:42px;height:42px;border-radius:10px;background:#e8f4fb;display:flex;align-items:center;justify-content:center;font-size:20px;margin-bottom:12px">🎧</div>
        <div style="font-family:'Madimi One',sans-serif;font-size:28px;color:#2d4a5a">0</div>
        <div style="font-size:12px;color:#888;margin-top:2px">Total Perangkat</div>
        <div style="font-size:11px;margin-top:8px;font-weight:600;color:#C8D96E">↑ Data dari tabel devices</div>
    </div>
    <div class="card" style="border-top:3px solid #F4A7D0">
        <div style="width:42px;height:42px;border-radius:10px;background:#fce9f3;display:flex;align-items:center;justify-content:center;font-size:20px;margin-bottom:12px">👥</div>
        <div style="font-family:'Madimi One',sans-serif;font-size:28px;color:#2d4a5a">0</div>
        <div style="font-size:12px;color:#888;margin-top:2px">Total User</div>
        <div style="font-size:11px;margin-top:8px;font-weight:600;color:#C8D96E">↑ Data dari tabel parents</div>
    </div>
    <div class="card" style="border-top:3px solid #C8D96E">
        <div style="width:42px;height:42px;border-radius:10px;background:#f3f8e4;display:flex;align-items:center;justify-content:center;font-size:20px;margin-bottom:12px">💰</div>
        <div style="font-family:'Madimi One',sans-serif;font-size:28px;color:#2d4a5a">0</div>
        <div style="font-size:12px;color:#888;margin-top:2px">Total Penjualan</div>
        <div style="font-size:11px;margin-top:8px;font-weight:600;color:#C8D96E">↑ Data dari tabel purchase</div>
    </div>
    <div class="card" style="border-top:3px solid #F4A7D0">
        <div style="width:42px;height:42px;border-radius:10px;background:#fce9f3;display:flex;align-items:center;justify-content:center;font-size:20px;margin-bottom:12px">🔧</div>
        <div style="font-family:'Madimi One',sans-serif;font-size:28px;color:#2d4a5a">0</div>
        <div style="font-size:12px;color:#888;margin-top:2px">Servis Aktif</div>
        <div style="font-size:11px;margin-top:8px;font-weight:600;color:#F4A7D0">↓ Data dari tabel service_log</div>
    </div>
</div>

<!-- Menu Cards -->
<p style="font-family:'Madimi One',sans-serif;font-size:16px;color:#2d4a5a;margin-bottom:14px">Menu Utama</p>
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:24px">
    <a href="{{ route('devices.index') }}" style="background:#fff;border-radius:14px;padding:22px;box-shadow:0 2px 8px rgba(0,0,0,0.06);border-top:4px solid #8DBED7;text-decoration:none;display:block;transition:all 0.2s">
        <div style="font-size:28px;margin-bottom:12px">🎧</div>
        <div style="font-family:'Madimi One',sans-serif;font-size:15px;color:#2d4a5a;margin-bottom:6px">Manajemen Perangkat</div>
        <div style="font-size:12px;color:#888;line-height:1.5">Lihat semua device, status aktif/tidak aktif, dan detail per user aplikasi</div>
        <div style="margin-top:14px;font-size:12px;font-weight:700;color:#8DBED7">Buka Menu →</div>
    </a>
    <a href="{{ route('purchases.index') }}" style="background:#fff;border-radius:14px;padding:22px;box-shadow:0 2px 8px rgba(0,0,0,0.06);border-top:4px solid #F4A7D0;text-decoration:none;display:block;transition:all 0.2s">
        <div style="font-size:28px;margin-bottom:12px">💰</div>
        <div style="font-family:'Madimi One',sans-serif;font-size:15px;color:#2d4a5a;margin-bottom:6px">Riwayat Penjualan</div>
        <div style="font-size:12px;color:#888;line-height:1.5">Rekap total penjualan, riwayat transaksi, dan data pembeli</div>
        <div style="margin-top:14px;font-size:12px;font-weight:700;color:#F4A7D0">Buka Menu →</div>
    </a>
    <a href="{{ route('service_logs.index') }}" style="background:#fff;border-radius:14px;padding:22px;box-shadow:0 2px 8px rgba(0,0,0,0.06);border-top:4px solid #C8D96E;text-decoration:none;display:block;transition:all 0.2s">
        <div style="font-size:28px;margin-bottom:12px">🔧</div>
        <div style="font-family:'Madimi One',sans-serif;font-size:15px;color:#2d4a5a;margin-bottom:6px">Garansi & Catatan</div>
        <div style="font-size:12px;color:#888;line-height:1.5">Log servis, catatan garansi per perangkat, dan update status servis</div>
        <div style="margin-top:14px;font-size:12px;font-weight:700;color:#C8D96E">Buka Menu →</div>
    </a>
</div>

<!-- Recent Data -->
<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
    <div class="card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <div style="font-family:'Madimi One',sans-serif;font-size:14px;color:#2d4a5a">🎧 Perangkat Terbaru</div>
            <a href="{{ route('devices.index') }}" style="font-size:12px;color:#8DBED7;font-weight:600;text-decoration:none">Lihat Semua</a>
        </div>
        <table>
            <tr>
                <th>Serial</th>
                <th>User</th>
                <th>Status</th>
            </tr>
            <tr>
                <td colspan="3" style="text-align:center;color:#bbb;padding:20px">
                    Belum ada data
                </td>
            </tr>
        </table>
    </div>
    <div class="card">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <div style="font-family:'Madimi One',sans-serif;font-size:14px;color:#2d4a5a">💰 Transaksi Terbaru</div>
            <a href="{{ route('purchases.index') }}" style="font-size:12px;color:#8DBED7;font-weight:600;text-decoration:none">Lihat Semua</a>
        </div>
        <table>
            <tr>
                <th>Invoice</th>
                <th>Pembeli</th>
                <th>Status</th>
            </tr>
            <tr>
                <td colspan="3" style="text-align:center;color:#bbb;padding:20px">
                    Belum ada data
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection