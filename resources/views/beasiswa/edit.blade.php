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
<div class="container mt-4">
    <h2>✏️ Edit Data Beasiswa 🎓</h2>

    <form action="{{ route('beasiswa.update', $beasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $beasiswa->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $beasiswa->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ $beasiswa->no_hp }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Semester</label>
            <input type="number" name="semester" class="form-control" value="{{ $beasiswa->semester }}" min="1" max="14" required>
        </div>


        <div class="mb-3">
            <label>IPK</label>
            <input type="text" name="ipk" value="{{ $beasiswa->ipk }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Beasiswa</label>
            <select name="jenis_id" class="form-control" required>
                @foreach($jenis as $j)
                    <option value="{{ $j->id }}" {{ $beasiswa->jenis_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_beasiswa }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Upload Berkas Baru (opsional)</label>
            <input type="file" name="berkas" class="form-control" accept=".pdf,.jpg,.png">
            @if($beasiswa->berkas)
                <small>File saat ini: <a href="{{ asset('storage/' . $beasiswa->berkas) }}" target="_blank">Lihat</a></small>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('beasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

