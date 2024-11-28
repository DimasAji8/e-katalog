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
        $kontak = Kontak::all();

        // Kirim data ke view
        return view('welcome', compact('reviews', 'kontak'));
    }
}

