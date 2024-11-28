@include('header')

<section class="container mx-auto px-6 py-10">
    <div class="text-center p-7">
        <h1 class="text-4xl font-bold text-gray-800 lg:text-5xl dark:text-white">GALERI</h1>
        <p class="mt-3 text-gray-500 w-2/3 mx-auto">Kami persembahkan berbagai variasi produk. Terdiri dari beragam ukuran, gaya,
            baik untuk lantai dan dinding yang mampu memenuhi kebutuhan Anda.</p>
    </div>
    <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
        @foreach ($galleries as $gallery)
        <div class="grid gap-4">
          <div class="relative overflow-hidden group">
            <!-- Gambar -->
            <img
              class="h-auto max-w-full rounded-lg object-cover object-center transition-transform transform group-hover:scale-105 group-hover:shadow-xl duration-300 ease-in-out"
              src="{{ asset('storage/' . $gallery->gambar) }}"
              alt="gallery-photo"
            />
            <!-- Overlay Gelap yang Terang Saat Hover -->
            <div class="absolute inset-0 bg-black opacity-80 group-hover:opacity-0 transition-opacity duration-300 ease-in-out"></div>
            <!-- Judul yang Muncul Saat Hover -->
            <div class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
              <h3 class="text-lg font-bold">{{ $gallery->judul }}</h3>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</section>

@include('footer')
