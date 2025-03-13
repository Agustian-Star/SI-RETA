<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('rekomendasi_tamus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('no_telp');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('keperluan', ['Rapat', 'Koordinasi', 'Konsultasi/Permintaan PPID', 'Kunjungan', 'Lain-lain']); // Sesuai dengan pilihan di controller
            $table->text('rincian');
            $table->string('bertemu');
            $table->string('lokasi');
            $table->time('waktu'); // Menggunakan 'time' untuk menyimpan waktu saja, atau 'datetime' untuk menyimpan tanggal dan waktu
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('rekomendasi_tamus');
    }
};
