<!-- resources/views/reviews/create.blade.php -->

@extends('layouts.app') <!-- Memanggil layout utama -->

@section('content') <!-- Konten utama untuk halaman ini -->

<div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Kirim Ulasan</h2>

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf

        <label for="name" class="block mb-2">Nama:</label>
        <input type="text" id="name" name="name" placeholder="Nama Anda" required class="block w-full mb-4 p-2 border border-gray-300 rounded-md">

        <label for="email" class="block mb-2">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email Anda" required class="block w-full mb-4 p-2 border border-gray-300 rounded-md">

        <label for="content" class="block mb-2">Isi Ulasan:</label>
        <textarea id="content" name="content" placeholder="Tulis ulasan Anda di sini" required class="block w-full mb-4 p-2 border border-gray-300 rounded-md"></textarea>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Kirim Ulasan</button>
    </form>
</div>

@endsection
