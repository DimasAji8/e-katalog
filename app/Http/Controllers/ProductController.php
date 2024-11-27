<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Kategori;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        // Mengambil semua data produk dengan relasi kategori dan merk
        $products = Product::with(['category', 'merk'])->get();

        // Mengirim data produk ke view
        return view('produk', compact('products'));
    }

    // Menampilkan detail produk
    public function detail($id)
    {
        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Kirim data produk ke view
        return view('produk.detail', compact('product'));
    }

    // Menampilkan produk berdasarkan kategori
    public function byCategory($id)
    {
        // Ambil kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        // Ambil produk yang berkaitan dengan kategori ini
        $products = Product::where('kategori_id', $kategori->id)->get();

        // Kirim data kategori dan produk ke view
        return view('produk.byCategory', compact('kategori', 'products'));
    }    
}
