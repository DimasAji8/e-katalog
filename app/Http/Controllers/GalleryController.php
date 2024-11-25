<?php

namespace App\Http\Controllers;

use App\Models\Gallery; // Pastikan model Gallery ada
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all(); // Ambil semua data galeri
        return view('galleries.index', compact('galleries')); // Arahkan ke view
    }
}
