<?php

use App\Http\Controllers\RekomendasiTamuController;
use Illuminate\Support\Facades\Route;

// Halaman Formulir Rekomendasi
Route::get('/', [RekomendasiTamuController::class, 'index'])->name('rekomendasi.index');

// Proses Penyimpanan Data & Rekomendasi
Route::post('/rekomendasi/store', [RekomendasiTamuController::class, 'store'])->name('rekomendasi.store');

// Halaman Hasil Rekomendasi
Route::get('/rekomendasi/{id}', [RekomendasiTamuController::class, 'show'])->name('rekomendasi.show');
