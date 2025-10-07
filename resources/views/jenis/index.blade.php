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
        padding: 20px;
    }

    .container {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        padding: 30px;
        width: 100%;
        max-width: 800px;
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
        text-align: center;
        margin-bottom: 25px;
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
        color: #fff;
    }

    .btn-warning {
        background: linear-gradient(45deg, #ffd93d, #ff8c42);
        border: none;
        color: #fff;
    }

    .btn-danger {
        background: linear-gradient(45deg, #ff6b6b, #ee5a24);
        border: none;
        color: #fff;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        text-align: center;
    }

    .table thead {
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
    }

    .alert {
        border-radius: 10px;
        border: none;
    }
</style>

<div class="container">
    <h2>📋 Daftar Jenis Beasiswa 🎓</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('jenis.create') }}" class="btn btn-primary">+ Tambah Data</a>

        @if(session('success'))
            <div class="alert alert-success mb-0">{{ session('success') }}</div>
        @endif
    </div>

    <table class="table table-bordered table-hover align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Beasiswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->nama_beasiswa }}</td>
                    <td>
                        <a href="{{ route('jenis.edit', ['jeni' => $row->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jenis.destroy', ['jeni' => $row->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-muted">Belum ada data jenis beasiswa</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
