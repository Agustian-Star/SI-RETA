<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekomendasiTamu;
use Carbon\Carbon;

class RekomendasiTamuController extends Controller
{
    public function index()
    {
        return view('rekomendasi.index');
    }

    public function store(Request $request)
{
    // Dapatkan rekomendasi otomatis berdasarkan keperluan
    $rekomendasi = $this->getRekomendasi($request->keperluan);

    // Simpan data ke database
    $tamu = RekomendasiTamu::create([
        'nama'          => $request->nama,
        'alamat'        => $request->alamat,
        'no_telp'       => $request->no_telp,
        'jenis_kelamin' => $request->jenis_kelamin,
        'keperluan'     => $request->keperluan,
        'rincian'       => $request->rincian,
        'bertemu'       => $rekomendasi['bertemu'],
        'lokasi'        => $rekomendasi['lokasi'],
        'waktu' => isset($rekomendasi['waktu'])
    ? ($rekomendasi['hari'] . ' ' .
       date('H:i', strtotime($rekomendasi['waktu']['jam_buka'])) . '-' .
       date('H:i', strtotime($rekomendasi['waktu']['jam_tutup'])))
    : '-',

    ]);


    // Redirect ke halaman hasil rekomendasi
    return redirect()->route('rekomendasi.show', $tamu->id);
}


    public function show($id)
    {
        $data = RekomendasiTamu::findOrFail($id);
        return view('rekomendasi.show', compact('data'));
    }

    // Metode untuk menentukan rekomendasi berdasarkan keperluan
    private function getRekomendasi($keperluan)
{
    // Set Carbon ke Bahasa Indonesia dan timezone Jakarta
    Carbon::setLocale('id');
    date_default_timezone_set('Asia/Jakarta');

    // Mapping keperluan dengan rekomendasi bertemu dan lokasi
    $rekomendasi = [
        'Rapat' => [
            'bertemu' => 'Ketua Sub Bagian Umum/Ketua Tim Kerja Manajerial',
            'lokasi'  => 'Kantor Sempur'
        ],
        'Koordinasi' => [
            'bertemu' => 'Ketua Tim Kerja Penyuluhan Perikanan',
            'lokasi'  => 'Kantor Sempur'
        ],
        'Konsultasi/Permintaan PPID' => [
            'bertemu' => 'Layanan Informasi Publik/PPID',
            'lokasi'  => 'Kantor Sempur'
        ],
        'Kunjungan' => [
            'bertemu' => 'Penanggung Jawab Instalasi',
            'lokasi'  => 'Instalasi Cijeruk'
        ],
        'Lain-lain' => [
            'bertemu' => 'Nama Dummy (disesuaikan)',
            'lokasi'  => 'Instalasi Depok'
        ],
    ];

    // Jam operasional per hari
    $jamOperasional = [
        'Senin'  => ['07:30', '16:00'],
        'Selasa' => ['07:30', '16:00'],
        'Rabu'   => ['07:30', '16:00'],
        'Kamis'  => ['07:30', '16:00'],
        'Jumat'  => ['07:30', '16:30'],
    ];

    // Ambil waktu sekarang
    $now = Carbon::now();
    $hariSekarang = $now->translatedFormat('l'); // Misal: "Rabu"
    $jamSekarang = $now->format('H:i'); // Misal: "17:00"

    // Jika sekarang hari Sabtu/Minggu, alihkan ke Senin
    if (in_array($hariSekarang, ['Sabtu', 'Minggu'])) {
        $now->next(Carbon::MONDAY);
        $hariSekarang = 'Senin';
    }

    // Cek apakah sudah melewati jam kerja hari ini
    $jamTutup = $jamOperasional[$hariSekarang][1];
    if ($jamSekarang > $jamTutup) {
        // Geser ke hari kerja berikutnya
        do {
            $now->addDay();
            $hariSekarang = $now->translatedFormat('l');
        } while (in_array($hariSekarang, ['Sabtu', 'Minggu'])); // Lewati weekend
    }

    // Ambil jam operasional untuk hari yang valid
    $jamBuka = $jamOperasional[$hariSekarang][0];
    $jamTutup = $jamOperasional[$hariSekarang][1];

    // Mengembalikan hasil dengan memisahkan waktu dan hari
    return [
        'bertemu' => $rekomendasi[$keperluan]['bertemu'] ?? 'Tidak diketahui',
        'lokasi'  => $rekomendasi[$keperluan]['lokasi'] ?? 'Tidak diketahui',
        'hari'    => $hariSekarang, // Hari yang dipilih
        'waktu'   => [
            'jam_buka'  => $jamBuka,
            'jam_tutup' => $jamTutup
        ]
    ];
}
}
