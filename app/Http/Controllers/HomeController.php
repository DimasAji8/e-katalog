<?php

namespace App\Http\Controllers;

use App\Http\Controllers\KontakController;
use App\Http\Controllers\ReviewController;
use App\Models\Review;
use App\Models\Kontak;


class HomeController extends Controller
{
    public function index()
    {
        // Ambil data ulasan yang disetujui/tampil
        $reviews = Review::where('is_visible', 1)->latest()->get();
        
        // Ambil semua data kontak
        $kontaks = Kontak::all(); // Ambil semua kontak sebagai koleksi

        // Mengambil data kontak pertama (opsional)
        $kontak = Kontak::first();

        // Menghapus "http://" atau "https://" dari URL jika ada
        if ($kontak) {
            $kontak->youtube = preg_replace('#https?://#', '', $kontak->youtube ?? '');
            $kontak->tiktok = preg_replace('#https?://#', '', $kontak->tiktok ?? '');
            $kontak->facebook = preg_replace('#https?://#', '', $kontak->facebook ?? '');
            $kontak->shopee = preg_replace('#https?://#', '', $kontak->shopee ?? '');
            $kontak->tokped = preg_replace('#https?://#', '', $kontak->tokped ?? '');
        }

        // Kirim data ke view
        return view('welcome', compact('reviews', 'kontak', 'kontaks'));
    }
}

