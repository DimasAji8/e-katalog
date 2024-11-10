<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Katalog</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Menggunakan Tailwind CSS untuk styling -->
</head>
<body class="font-sans bg-gray-100 text-gray-900">

    <!-- Navigasi -->
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <a href="/" class="text-lg font-bold">E-Katalog</a>
            <div>
                <a href="{{ route('reviews.create') }}" class="hover:underline">Kirim Ulasan</a>
            </div>
        </div>
    </nav>

    <!-- Konten utama halaman -->
    <div class="container mx-auto p-6">
        @yield('content') <!-- Ini adalah tempat untuk menampilkan konten halaman lain -->
    </div>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white p-4 text-center">
        <p>&copy; 2024 E-Katalog. All Rights Reserved.</p>
    </footer>

</body>
</html>
