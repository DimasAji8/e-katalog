<?php

namespace App\Http\Controllers;

use App\Models\Tentang;

class TentangController extends Controller
{
    /**
     * Menampilkan data tentang di halaman views.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil data tentang pertama dari database
        $tentang = Tentang::first();

        // Mengirim data tentang ke view
        return view('tentang', compact('tentang'));
    }
}
