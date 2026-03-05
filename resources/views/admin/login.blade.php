<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Noise Safe Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: #0a0e1a;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
        .card {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 12px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }
        .logo {
            text-align: center;
            margin-bottom: 32px;
        }
        .logo h1 { color: #00d4aa; font-size: 24px; font-weight: 800; }
        .logo p { color: #64748b; font-size: 13px; margin-top: 4px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; color: #94a3b8; font-size: 13px; margin-bottom: 6px; }
        input {
            width: 100%;
            background: #1f2937;
            border: 1px solid #374151;
            border-radius: 8px;
            padding: 10px 14px;
            color: #f1f5f9;
            font-size: 14px;
            outline: none;
        }
        input:focus { border-color: #00d4aa; }
        .btn {
            width: 100%;
            background: #00d4aa;
            color: #000;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 8px;
        }
        .btn:hover { background: #00b894; }
        .error {
            background: rgba(239,68,68,0.1);
            border: 1px solid #ef4444;
            color: #fca5a5;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">
            <h1>🎧 Noise Safe</h1>
            <p>Admin Panel</p>
        </div>

        @if(session('error'))
            <div class="error">⚠️ {{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" placeholder="Masukkan nama" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn">Masuk</button>
        </form>
    </div>
</body>
</html>