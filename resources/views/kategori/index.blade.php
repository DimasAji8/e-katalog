<!-- Include Header -->
@include('header')

<section class="bg-transparent py-10">
    <div class="container mx-auto flex flex-wrap justify-center gap-10">
        <div class="text-center p-5">
            <h1 class="text-4xl font-bold text-gray-800 lg:text-5xl dark:text-white">KATEGORI</h1>
            <p class="mt-3 text-gray-500 w-2/3 mx-auto">Kami persembahkan berbagai variasi produk. Terdiri dari beragam ukuran, gaya,
                baik untuk lantai dan dinding yang mampu memenuhi kebutuhan Anda.</p>
        </div>
        @foreach ($categories as $item)
            <a href="{{ route('produk.byCategory', $item->id) }}" class="block">
                <!-- Menampilkan gambar -->
                <img
                    alt="{{ $item->name }}"
                    src="{{ asset('storage/' . $item->gambar) }}"
                    class="h-64 w-full object-cover sm:h-80 lg:h-96"
                />
                <!-- Menampilkan nama -->
                <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">{{ $item->name }}</h3>
                <!-- Menampilkan deskripsi -->
                <p class="mt-2 max-w-sm text-gray-700">
                    {{ $item->deskripsi }}
                </p>
            </a>
        @endforeach
    </div>
</section>

<!-- Include Footer -->
@include('footer')
