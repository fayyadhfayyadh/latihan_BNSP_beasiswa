<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis'; 

    protected $fillable = [
        'nama_beasiswa',
    ];

    // Relasi ke model Beasiswa
    public function beasiswas()
    {
        return $this->hasMany(Beasiswa::class, 'jenis_id');
    }
}
