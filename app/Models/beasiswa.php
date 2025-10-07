<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $table = 'beasiswas'; // pastikan nama tabel sesuai di database

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'semester',
        'ipk',
        'jenis_id', // foreign key dari tabel jenis
        'berkas',
        'status',   // misal: diterima / ditolak / pending
    ];

    // Relasi ke tabel Jenis
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
