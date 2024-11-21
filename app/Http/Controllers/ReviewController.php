<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Menampilkan form untuk menambah ulasan
    public function create()
    {
        return view('reviews.create');
    }

    // Menyimpan ulasan ke dalam database
    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'content' => 'required|string',
        ]);

        // Simpan ulasan ke dalam database
        Review::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'content' => $validated['content'],
            'is_visible' => 1, // Default ulasan tampil
        ]);

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('message', 'Ulasan berhasil dikirim.');
    }
}
