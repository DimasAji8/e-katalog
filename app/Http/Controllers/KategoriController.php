<?php

namespace App\Http\Controllers;

use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar kategori di halaman views.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data kategori dari database
        $categories = Kategori::all();

        // Mengirim data kategori ke view
        return view('kategori.index', compact('categories'));
    }
}
