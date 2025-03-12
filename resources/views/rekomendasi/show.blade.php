<!-- resources/views/rekomendasi/show.blade.php -->
@extends('layouts.app')

@section('title', 'Detail Rekomendasi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4>Detail Rekomendasi</h4>
    </div>
    <div class="card-body">
        <p><strong>Nama:</strong> {{ $rekomendasi->nama }}</p>
        <p><strong>Keperluan:</strong> {{ $rekomendasi->keperluan }}</p>
        <p><strong>Tujuan:</strong> {{ $rekomendasi->rekomendasi_tujuan }}</p>
        <p><strong>Waktu:</strong> {{ $rekomendasi->rekomendasi_waktu }}</p>
        <p><strong>Orang:</strong> {{ $rekomendasi->rekomendasi_orang }}</p>
        <a href="{{ route('rekomendasi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
