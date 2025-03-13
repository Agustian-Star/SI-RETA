@extends('layouts.app')

@section('title', 'SI-RETA | Form Rekomendasi Tamu')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Form Rekomendasi Tamu</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('rekomendasi.store') }}" method="POST">
                @csrf

                <label>Nama:</label>
                <input type="text" name="nama" class="form-control" required>

                <label>Alamat:</label>
                <textarea name="alamat" class="form-control" required></textarea>

                <label>No. Telepon:</label>
                <input type="text" name="no_telp" class="form-control" required>

                <label>Jenis Kelamin:</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <label>Keperluan:</label>
                <select name="keperluan" class="form-control" required>
                    <option value="Rapat">Rapat</option>
                    <option value="Koordinasi">Koordinasi</option>
                    <option value="Kunjungan">Kunjungan</option>
                    <option value="Konsultasi/Permintaan PPID">Konsultasi/Permintaan PPID</option>
                    <option value="Lain-lain">Lain-lain</option>
                </select>

                <label>Rincian Keperluan:</label>
                <textarea name="rincian" class="form-control" required></textarea>

                <button type="submit" class="btn btn-primary mt-3">Dapatkan Rekomendasi</button>
            </form>
        </div>
    </div>
</div>
@endsection
