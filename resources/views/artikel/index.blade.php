@include('header')

<section class="bg-white dark:bg-gray-900 container mx-auto px-10">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">Daftar Artikel</h1>

        <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
            @foreach ($articles as $artikel)
                <div class="lg:flex">
                    <!-- Menampilkan gambar artikel -->
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64" 
                         src="{{ asset('storage/' . $artikel->gambar) }}" 
                         alt="{{ $artikel->judul }}">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <!-- Menampilkan judul artikel dengan link ke detail -->
                        <a href="{{ route('berita.show', $artikel->id) }}" 
                           class="text-xl font-semibold text-gray-800 hover:underline dark:text-white">
                            {{ $artikel->judul }}
                        </a>

                        <!-- Menampilkan deskripsi artikel -->
                        <span class="text-sm text-gray-500 dark:text-gray-300">
                            {{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 100) }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('footer')
