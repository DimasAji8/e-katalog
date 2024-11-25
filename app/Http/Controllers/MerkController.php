<?php

namespace App\Http\Controllers;

use App\Models\Merk;

class MerkController extends Controller
{
    /**
     * Menampilkan daftar merk di halaman views.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data merk dari database
        $merks = Merk::all();

        // Mengirim data merk ke view
        return view('merk.index', compact('merks'));
    }
}
