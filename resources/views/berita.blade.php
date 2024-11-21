 <!-- Include Header -->
 @include('header')

 <!-- Konten Berita -->
 <div class="container mx-auto mt-10">
    <h2 class="text-3xl font-bold mb-4">Berita Terbaru</h2>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($berita as $item)
            <div class="bg-white rounded-lg shadow-md p-4"></div>
                <h3 class="text-lg font-semibold mb-2">{{ $item->judul }}</h3>
                <p class="text-gray-600">{{ $item->isi }}</p>
                <a href="{{ route('berita', $item->id) }}" class="mt-2 block text-blue-500 hover:text-blue-700">Lihat Selengkapnya</a>
            </div>
        @endforeach
    </div>
</div>


 <!-- Include Footer -->
 @include('footer')