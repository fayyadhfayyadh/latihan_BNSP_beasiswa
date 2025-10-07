<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Beasiswa App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fce4ec, #e1f5fe, #f3e5f5, #fff3e0) !important;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            color: #333;
        }
        .btn {
            border-radius: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            font-weight: bold;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        .btn-primary {
            background: linear-gradient(45deg, #ff6b9d, #c44569);
            border: none;
        }
        .btn-outline-secondary {
            border-color: #a8e6cf;
            color: #6b9b7b;
        }
        .btn-outline-secondary:hover {
            background: linear-gradient(45deg, #a8e6cf, #6b9b7b);
            border-color: #6b9b7b;
        }
        h1 {
            color: #e91e63;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            font-weight: bold;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center" style="height: 100vh;">

    <div class="text-center">
        <h1 class="mb-4 fw-bold">🎉 Selamat Datang di Aplikasi Beasiswa 🎓</h1>
        <p class="mb-4">Kelola data jenis beasiswa dengan mudah melalui sistem ini. 🌟</p>

        <!-- Tombol menuju form tambah beasiswa -->
        <a href="{{ route('jenis.create') }}" class="btn btn-primary btn-lg">
            ➕ Tambah Jenis Beasiswa
        </a>

        <!-- Opsional: tombol lihat daftar -->
        <a href="{{ route('jenis.index') }}" class="btn btn-outline-secondary btn-lg ms-2">
            📋 Lihat Daftar Beasiswa
        </a>

        <a href="{{ route('beasiswa.index') }}" class="btn btn-outline-secondary btn-lg ms-2">
            📝 Daftar Beasiswa
        </a>
    </div>

</body>
</html>
