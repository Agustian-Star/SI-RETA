@extends('layouts.app')
@section('title', 'SI-RETA | Hasil Rekomendasi')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h4>Hasil Rekomendasi </h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>Nama</th><td>{{ $data->nama }}</td></tr>
                <tr><th>Keperluan</th><td>{{ $data->keperluan }}</td></tr>
                <tr><th>Rincian Keperluan</th><td>{{ $data->rincian ?? '-' }}</td></tr>
                <tr><th>Bertemu dengan</th><td>{{ $data->bertemu }}</td></tr>
                <tr><th>Lokasi</th><td>{{ $data->lokasi }}</td></tr>
                <tr><th>Waktu Kunjungan</th><td>{{ $data->waktu ?? '-' }}</td></tr>
            </table>
            <a href="{{ route('rekomendasi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
