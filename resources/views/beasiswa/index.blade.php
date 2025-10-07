<style>
    body {
        background: linear-gradient(135deg, #fce4ec, #e1f5fe, #f3e5f5, #fff3e0);
        font-family: 'Comic Sans MS', cursive, sans-serif;
        color: #333;
        height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.15);
        padding: 30px;
        width: 90%;
        max-width: 1100px;
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
    .btn-warning {
        background: linear-gradient(45deg, #ffd93d, #ff8c42);
        border: none;
    }
    .btn-danger {
        background: linear-gradient(45deg, #ff6b6b, #ee5a24);
        border: none;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .table thead {
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
    }
    h2 {
        color: #e91e63;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        font-weight: bold;
    }
    .alert {
        border-radius: 10px;
        border: none;
    }
</style>

<div class="container text-center">
    <h2 class="mb-4">🎓 Daftar Beasiswa 📚</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('beasiswa.create') }}" class="btn btn-primary">+ Tambah Beasiswa</a>

        @if(session('success'))
            <div class="alert alert-success mb-0">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Semester</th>
                <th>IPK</th>
                <th>Jenis Beasiswa</th>
                <th>Berkas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $index => $row)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->no_hp }}</td>
                    <td class="text-center">{{ $row->semester }}</td>
                    <td class="text-center">{{ $row->ipk }}</td>
                    <td>{{ $row->jenis->nama_beasiswa ?? '-' }}</td>
                    <td class="text-center">
                        @if($row->berkas)
                            <a href="{{ asset('storage/' . $row->berkas) }}" target="_blank" class="btn btn-sm btn-info">
                                Lihat
                            </a>
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('beasiswa.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('beasiswa.destroy', $row->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">Belum ada data beasiswa</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
