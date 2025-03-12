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
            $table->string('keperluan');
            $table->text('rincian_keperluan');
            $table->string('rekomendasi_tujuan')->nullable();
            $table->string('rekomendasi_waktu')->nullable();
            $table->string('rekomendasi_orang')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('rekomendasi_tamus');
    }
};
