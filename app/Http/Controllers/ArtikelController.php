<?php

namespace App\Http\Controllers;

use App\Models\Artikel;

class ArtikelController extends Controller
{
    /**
     * Menampilkan daftar artikel di halaman views.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data artikel dari database
        $articles = Artikel::all();

        // Mengirim data artikel ke view
        return view('artikel.index', compact('articles'));
    }
    public function show($id)
    {
        // Mengambil artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Mengirim artikel ke view detail
        return view('artikel.detail', compact('artikel')); // Pastikan folder sesuai
    }
}
