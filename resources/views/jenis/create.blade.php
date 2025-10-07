<style>
    body {
        background: linear-gradient(135deg, #fce4ec, #e1f5fe, #f3e5f5, #fff3e0);
        font-family: 'Comic Sans MS', cursive, sans-serif;
        color: #333;
        min-height: 100vh;
        display: flex;
        align-items: center; /* Tengah vertikal */
        justify-content: center; /* Tengah horizontal */
        margin: 0;
    }
    .container {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        padding: 30px 40px;
        width: 100%;
        max-width: 500px; /* Biar gak terlalu lebar */
        text-align: center;
        animation: fadeIn 0.8s ease;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    h2 {
        color: #e91e63;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        font-weight: bold;
        margin-bottom: 25px;
    }
    .form-control {
        border-radius: 10px;
        border: 2px solid #ddd;
        transition: border-color 0.3s ease;
        padding: 10px;
        font-size: 16px;
    }
    .form-control:focus {
        border-color: #ff6b9d;
        box-shadow: 0 0 10px rgba(255, 107, 157, 0.3);
    }
    .btn {
        border-radius: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        font-weight: bold;
        padding: 10px 20px;
        margin: 5px;
    }
    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    }
    .btn-success {
        background: linear-gradient(45deg, #4ecdc4, #44a08d);
        border: none;
        color: white;
    }
    .btn-secondary {
        background: linear-gradient(45deg, #a8e6cf, #6b9b7b);
        border: none;
        color: white;
    }
</style>

<div class="container">
    <h2>➕ Tambah Jenis Beasiswa 🎓</h2>

    <form action="{{ route('jenis.store') }}" method="POST">
        @csrf
        <div class="mb-3 text-start">
            <label class="form-label">Nama Beasiswa</label>
            <input type="text" name="nama_beasiswa" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
