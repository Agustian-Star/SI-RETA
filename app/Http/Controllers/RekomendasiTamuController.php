<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekomendasiTamu;

class RekomendasiTamuController extends Controller
{
    public function index()
    {
        return view('rekomendasi.index', ['rekomendasi' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'keperluan' => 'required|string',
            'rincian_keperluan' => 'required|string',
        ]);

        // Simulasi rekomendasi
        $rekomendasi = $this->generateRekomendasi($request->rincian_keperluan);

        $tamu = RekomendasiTamu::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'keperluan' => $request->keperluan,
            'rincian_keperluan' => $request->rincian_keperluan,
            'rekomendasi_tujuan' => $rekomendasi['tujuan'],
            'rekomendasi_waktu' => $rekomendasi['waktu'],
            'rekomendasi_orang' => $rekomendasi['orang'],
        ]);

        return redirect()->route('rekomendasi.show', $tamu->id);
    }

    public function show($id)
    {
        $rekomendasi = RekomendasiTamu::findOrFail($id);
        return view('rekomendasi.index', compact('rekomendasi'));
    }

    private function generateRekomendasi($rincian)
    {
        if (str_contains(strtolower($rincian), 'konsultasi')) {
            return ['tujuan' => 'Ruang Konsultasi', 'waktu' => '10:00 - 12:00', 'orang' => 'Konsultan A'];
        } elseif (str_contains(strtolower($rincian), 'rapat')) {
            return ['tujuan' => 'Ruang Rapat', 'waktu' => '14:00 - 16:00', 'orang' => 'Kepala Bagian'];
        } else {
            return ['tujuan' => 'Lobi Utama', 'waktu' => '09:00 - 11:00', 'orang' => 'Petugas Resepsionis'];
        }
    }
}
