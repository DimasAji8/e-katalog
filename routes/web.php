<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategori', function() {
    return view('kategori');
});

Route::get('/berita', function () {
    return view('kontak');
});


