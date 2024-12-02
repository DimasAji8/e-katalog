<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function index()
    {
        return view('kalkulator/index'); // Tampilkan form kalkulator pertama kali
    }

    public function hitung(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'panjang' => 'required|numeric|min:0.1',
            'lebar' => 'required|numeric|min:0.1',
            'ukuran_keramik' => 'required|numeric',
        ]);

        // Ambil data dari input user
        $panjang = $request->input('panjang');
        $lebar = $request->input('lebar');
        $ukuranKeramik = $request->input('ukuran_keramik');

        // Hitung luas lantai
        $luasLantai = $panjang * $lebar;

        // Hitung jumlah keramik
        $jumlahKeramik = ceil($luasLantai / $ukuranKeramik);

        // Ambil jumlah keramik per dus (box) berdasarkan ukuran keramik
        $keramikPerDus = $this->getKeramikPerDus($ukuranKeramik);

        // Hitung jumlah box
        $jumlahBox = ceil($jumlahKeramik / $keramikPerDus);

        // Kirim hasil ke view
        return view('kalkulator/index', compact('luasLantai', 'jumlahKeramik', 'jumlahBox'));
    }

    // Fungsi untuk mendapatkan jumlah keramik per dus (box) berdasarkan ukuran keramik
    private function getKeramikPerDus($ukuranKeramik)
    {
        switch($ukuranKeramik) {
            case 0.04: return 25;   // 20x20 cm
            case 0.0625: return 16;  // 25x25 cm
            case 0.09: return 11;    // 30x30 cm
            case 0.105: return 9;    // 32.5x32.5 cm
            case 0.1089: return 9;   // 33x33 cm
            case 0.1111: return 9;   // 33.3x33.3 cm
            case 0.16: return 6;     // 40x40 cm
            case 0.2025: return 5;   // 45x45 cm
            case 0.25: return 4;     // 50x50 cm
            case 0.36: return 3;     // 60x60 cm
            default: return 0;       // Tidak diketahui
        }
    }
}
