<!-- resources/views/header.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body>
    <!-- Navbar -->
    <nav class="bg-gray-200 py-5">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold">Welcome</h1>
            </div>
            <div>
                <ul class="flex justify-evenly gap-5">
                    <li class="px-5 py-3 {{ request()->is('/') ? 'bg-gray-200' : '' }}">
                        <a href="/">Beranda</a>
                    </li>
                    <li class="px-5 py-3 {{ request()->is('kategori*') ? 'bg-gray-200' : '' }}">
                        <a href="/kategori">Kategori</a>
                    </li>
                    <!-- Dropdown Produk -->
                    <li class="relative px-5 py-3 {{ request()->is('produk*') ? 'bg-gray-200' : '' }}" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center">
                            Produk
                        </button>
                        <!-- Dropdown Menu -->
                        <ul 
                            x-show="open" 
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90"
                            @click.away="open = false"
                            class="absolute left-0 mt-2 w-40 bg-white border rounded-lg shadow-lg">
                            <li class="px-4 py-2 hover:bg-gray-200">
                                <a href="/produk/tambah">Tambah Produk</a>
                            </li>
                            <li class="px-4 py-2 hover:bg-gray-200">
                                <a href="/produk/list">List Produk</a>
                            </li>
                        </ul>
                    </li>
                    <li class="px-5 py-3 {{ request()->is('berita') ? 'bg-gray-200' : '' }}">
                        <a href="/berita">Berita</a>
                    </li>
                    <li class="px-5 py-3 {{ request()->is('kontak') ? 'bg-gray-200' : '' }}">
                        <a href="/kontak">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>