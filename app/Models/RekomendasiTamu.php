<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekomendasiTamu extends Model {
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'jenis_kelamin',
        'keperluan',
        'rincian', // Sesuai dengan perubahan di migration
        'bertemu', // Sesuai dengan perubahan di migration
        'lokasi',  // Sesuai dengan perubahan di migration
        'waktu',   // Sesuai dengan perubahan di migration
    ];
}
