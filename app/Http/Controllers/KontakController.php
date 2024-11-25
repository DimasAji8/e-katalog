<?php

namespace App\Http\Controllers;

use App\Models\Kontak;

class KontakController extends Controller
{
    /**
     * Menampilkan daftar kontak di halaman views.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil data kontak pertama dari database
        $kontak = Kontak::first();

        // Mengirim data kontak ke view
        return view('kontak.index', compact('kontak'));
    }
}
