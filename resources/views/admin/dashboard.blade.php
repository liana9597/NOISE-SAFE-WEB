<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Noise Safe Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: #0a0e1a;
            color: #f1f5f9;
            font-family: Arial, sans-serif;
            padding: 40px;
        }
        h1 { color: #00d4aa; font-size: 24px; }
        p { color: #64748b; margin-top: 8px; }
        .btn-logout {
            margin-top: 24px;
            background: #ef4444;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-logout:hover { background: #dc2626; }
    </style>
</head>
<body>
    <h1>🎧 Noise Safe Admin Panel</h1>
    <p>Selamat datang, {{ session('admin')->name }}!</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
    </form>
</body>
</html>