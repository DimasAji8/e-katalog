<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Menampilkan daftar ulasan.
     *
     * @return \Illuminate\View\View
     */

    /**
     * Menyimpan ulasan ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function index()
    {
        return view('testimoni.index');
    }
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string|max:1000',
        ]);

        // Simpan ulasan ke database
        Review::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'content' => $validated['content'],
            'is_visible' => 1, // Default ulasan tampil
        ]);

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('review.index')->with('message', 'Ulasan Anda telah berhasil dikirim.');
    }
}

