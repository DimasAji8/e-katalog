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
        $merks = Merk::all();  // Ambil semua merk
        $produks = Product::all();  // Ambil semua produk
    
        return view('merk.index', compact('merks', 'produks'));
    }
    
    public function byMerk($id)
    {
        $merk = Merk::findOrFail($id);
        $products = Product::where('merk_id', $merk->id)->get();
    
        return view('produk.byMerk', compact('merk', 'products'));
    }
    
}
