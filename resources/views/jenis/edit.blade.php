<style>
    body {
        background: linear-gradient(135deg, #fce4ec, #e1f5fe, #f3e5f5, #fff3e0);
        font-family: 'Comic Sans MS', cursive, sans-serif;
        color: #333;
    }
    .container {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        padding: 20px;
        margin-top: 20px;
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
    .btn-success {
        background: linear-gradient(45deg, #4ecdc4, #44a08d);
        border: none;
    }
    .btn-secondary {
        background: linear-gradient(45deg, #a8e6cf, #6b9b7b);
        border: none;
    }
    h2 {
        color: #e91e63;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        font-weight: bold;
    }
    .form-control {
        border-radius: 10px;
        border: 2px solid #ddd;
        transition: border-color 0.3s ease;
    }
    .form-control:focus {
        border-color: #ff6b9d;
        box-shadow: 0 0 10px rgba(255, 107, 157, 0.3);
    }
</style>
<div class="container">
    <h2>✏️ Edit Jenis Beasiswa 🎓</h2>

    <form action="{{ route('jenis.update', ['jeni' => $jeni->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Beasiswa</label>
            <input type="text" name="nama_beasiswa" class="form-control" value="{{ $jeni->nama_beasiswa }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
