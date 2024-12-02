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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KalkulatorController;

// Route untuk halaman utama
Route::get('/', [HomeController::class, 'index'])->name('welcome');


// Rute Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

// Rute untuk menampilkan produk berdasarkan kategori
Route::get('/kategori/{id}', [ProductController::class, 'byCategory'])->name('produk.byCategory');

// Rute Merk
Route::get('/merk', [MerkController::class, 'index'])->name('merk.index');

// Rute untuk menampilkan produk berdasarkan merk
Route::get('/merk/{id}', [MerkController::class, 'byMerk'])->name('produk.byMerk');

// Rute untuk menampilkan detail produk
Route::get('/produk/{id}', [ProductController::class, 'detail'])->name('produk.detail');


// Rute Berita
Route::get('/berita', [ArtikelController::class, 'index'])->name('berita.index');

// Route untuk detail artikel
Route::get('/berita/{id}', [ArtikelController::class, 'show'])->name('berita.show');



// Rute Review
Route::get('/testimoni', [ReviewController::class, 'index'])->name('review.index');
Route::get('/testimoni/create', [ReviewController::class, 'create'])->name('review.create');
Route::post('/testimoni', [ReviewController::class, 'store'])->name('review.store');

// Rute Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Rute Kalkulator
Route::get('/kalkulator', [KalkulatorController::class, 'index'])->name('kalkulator');

// Route untuk menangani form setelah dikirim
Route::post('/kalkulator', [KalkulatorController::class, 'hitung'])->name('hitungKalkulator');