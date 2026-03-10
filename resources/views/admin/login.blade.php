<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Noise Safe Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: #8DBED7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 24px;
            width: 100%;
            max-width: 420px;
            padding: 24px;
        }
        .logo-area {
            text-align: center;
        }
        .logo-area h1 {
            font-family: 'Madimi One', sans-serif;
            font-size: 36px;
            color: #fff;
            letter-spacing: 1px;
        }
        .logo-area h1 span {
            color: #C8D96E;
        }
        .logo-area p {
            color: #fff;
            font-size: 13px;
            margin-top: 4px;
            opacity: 0.85;
        }
        .card {
            background: #fff;
            border-radius: 20px;
            padding: 36px 32px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(0,0,0,0.12);
        }
        .card h2 {
            font-family: 'Madimi One', sans-serif;
            font-size: 22px;
            color: #8DBED7;
            margin-bottom: 6px;
        }
        .card p {
            font-size: 13px;
            color: #999;
            margin-bottom: 24px;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
        }
        input {
            width: 100%;
            background: #f5f5f5;
            border: 2px solid #f5f5f5;
            border-radius: 10px;
            padding: 11px 14px;
            color: #333;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: border 0.2s;
        }
        input:focus {
            border-color: #8DBED7;
            background: #fff;
        }
        .btn {
            width: 100%;
            background: #F4A7D0;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 13px;
            font-size: 15px;
            font-family: 'Madimi One', sans-serif;
            letter-spacing: 0.5px;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
        }
        .btn:hover {
            background: #e891bf;
        }
        .error {
            background: #fff0f5;
            border: 1.5px solid #F4A7D0;
            color: #c0507a;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 18px;
        }
        .dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #C8D96E;
            margin-right: 4px;
        }
    </style>
</head>
<body>
    <div class="wrapper">

        <!-- Logo -->
        <div class="logo-area">
            <h1><span>N</span>oise Safe</h1>
            <p>Admin Panel</p>
        </div>

        <!-- Card Login -->
        <div class="card">
            <h2>Selamat Datang! 👋</h2>
            <p>Masuk ke panel admin Noise Safe</p>

            @if(session('error'))
                <div class="error">⚠️ {{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="form-group">
                    <label><span class="dot"></span>Nama</label>
                    <input type="text" name="name" placeholder="Masukkan nama" required>
                </div>
                <div class="form-group">
                    <label><span class="dot"></span>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn">Masuk →</button>
            </form>
        </div>

    </div>
</body>
</html>