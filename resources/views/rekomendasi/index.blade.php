@extends('layouts.app')

@section('title', 'Sistem Rekomendasi Tamu')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Form Rekomendasi Tamu</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('rekomendasi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telepon</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan</label>
                <input type="text" name="keperluan" id="keperluan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="rincian_keperluan" class="form-label">Rincian Keperluan</label>
                <textarea name="rincian_keperluan" id="rincian_keperluan" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>

@if($rekomendasi)
<div class="card mt-4">
    <div class="card-header bg-secondary text-white">
        <h4 class="mb-0">Hasil Rekomendasi</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td>{{ $rekomendasi->nama }}</td>
            </tr>
            <tr>
                <th>Keperluan</th>
                <td>{{ $rekomendasi->keperluan }}</td>
            </tr>
            <tr>
                <th>Rincian</th>
                <td>{{ $rekomendasi->rincian_keperluan }}</td>
            </tr>
            <tr>
                <th>Tujuan</th>
                <td>{{ $rekomendasi->rekomendasi_tujuan }}</td>
            </tr>
            <tr>
                <th>Waktu</th>
                <td>{{ $rekomendasi->rekomendasi_waktu }}</td>
            </tr>
            <tr>
                <th>Orang</th>
                <td>{{ $rekomendasi->rekomendasi_orang }}</td>
            </tr>
        </table>

        <button type="button" class="btn btn-success mt-3" id="btnOke">Oke</button>
    </div>
</div>

<script>
    document.getElementById("btnOke").addEventListener("click", function() {
        window.location.href = "{{ route('rekomendasi.index') }}";
    });
</script>
@endif
