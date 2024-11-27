@include('header')

<section class="bg-white dark:bg-gray-900 container mx-auto px-10">
    <div class="container px-6 py-10 mx-auto">
        <div class="max-w-4xl mx-auto">
            <!-- Menampilkan judul artikel -->
            <h1 class="text-3xl font-bold text-gray-800 capitalize lg:text-4xl dark:text-white">
                {{ $artikel->judul }}
            </h1>

            <!-- Menampilkan tanggal artikel -->
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">
                Dipublikasikan pada {{ $artikel->created_at->format('d M Y') }}
            </p>

            <!-- Menampilkan gambar artikel -->
            <div class="mt-6">
                <img class="object-cover w-full h-64 rounded-lg" 
                     src="{{ asset('storage/' . $artikel->gambar) }}" 
                     alt="{{ $artikel->judul }}">
            </div>

            <!-- Menampilkan isi artikel -->
            <div class="mt-6 text-gray-800 dark:text-gray-300 leading-relaxed">
                {!! $artikel->isi !!}
            </div>
        </div>
    </div>
</section>

@include('footer')
