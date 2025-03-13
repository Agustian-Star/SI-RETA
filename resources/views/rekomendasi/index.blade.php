@extends('layouts.app')

@section('title', 'SI-RETA | Rekomendasi Tamu')

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
                <input type="text" id="nama" name="nama" class="form-control">

                <label>Alamat:</label>
                <textarea name="alamat" id="alamat" class="form-control"></textarea>

                <label>No. Telepon:</label>
                <input type="text" id="no_telp" name="no_telp" class="form-control">

                <label>Jenis Kelamin:</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <label>Keperluan:</label>
                <select name="keperluan" id="keperluan" class="form-control">
                    <option value="" disabled selected>Pilih Keperluan</option>
                    <option value="Rapat">Rapat</option>
                    <option value="Koordinasi">Koordinasi</option>
                    <option value="Kunjungan">Kunjungan</option>
                    <option value="Konsultasi/Permintaan PPID">Konsultasi/Permintaan PPID</option>
                    <option value="Lain-lain">Lain-lain</option>
                </select>

                <label>Rincian Keperluan:</label>
                <textarea name="rincian" id="rincian_keperluan" class="form-control"></textarea>

                <button type="submit" class="btn btn-primary mt-3">Kirim Formulir</button>
            </form>
        </div>
    </div>
</div>
@endsection
