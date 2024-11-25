<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    return view('welcome');
});

// Rute Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

// Rute Berita
Route::get('/berita', [ArtikelController::class, 'index'])->name('berita.index');

// Rute Produk
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
Route::get('/produk/{product}', [ProductController::class, 'show'])->name('produk.show');

// Rute Tentang
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');

// Rute Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');

// Rute Merk
Route::get('/merk', [MerkController::class, 'index'])->name('merk.index');

// Rute Review
Route::get('/testimoni', [ReviewController::class, 'index'])->name('review.index');

// Rute Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
