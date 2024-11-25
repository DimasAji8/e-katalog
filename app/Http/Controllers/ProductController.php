<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk di halaman views.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data produk dengan relasi kategori dan merk
        $products = Product::with(['category', 'merk'])->get();

        // Mengirim data produk ke view
        return view('product.index', compact('products'));
    }

    /**
     * Menampilkan detail sebuah produk.
     *
     * @param  Product $product
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        // Memuat relasi kategori dan merk untuk detail produk
        $product->load(['category', 'merk']);

        // Mengirim data produk ke view
        return view('product.show', compact('product'));
    }
}
