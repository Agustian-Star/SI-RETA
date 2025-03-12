<?php
use App\Http\Controllers\RekomendasiTamuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RekomendasiTamuController::class, 'index'])->name('rekomendasi.index');
Route::post('/rekomendasi/store', [RekomendasiTamuController::class, 'store'])->name('rekomendasi.store'); // ✅ Diperbaiki
Route::get('/rekomendasi/{id}', [RekomendasiTamuController::class, 'show'])->name('rekomendasi.show')->where('id', '[0-9]+'); // ✅ Dibatasi hanya angka
