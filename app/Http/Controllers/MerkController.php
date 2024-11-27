<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Product;

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

    public function byMerk($id)
    {
        // Ambil merk berdasarkan ID
        $merk = Merk::findOrFail($id);

        // Ambil semua produk berdasarkan merk
        $products = Product::where('merk_id', $merk->id)->get();

        // Kirim data merk dan produk ke view
        return view('produk.byMerk', compact('merk', 'products'));
    }
}
