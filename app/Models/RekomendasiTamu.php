<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekomendasiTamu extends Model {
    use HasFactory;

    protected $fillable = [
        'nama', 'alamat', 'no_telp', 'jenis_kelamin',
        'keperluan', 'rincian_keperluan',
        'rekomendasi_tujuan', 'rekomendasi_waktu', 'rekomendasi_orang'
    ];
}
