<!-- Include Header -->
@include('header')

<section class="bg-transparent py-10">
    <div class="container mx-auto px-4">
        <!-- Header Kategori -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 lg:text-5xl dark:text-white">KATEGORI</h1>
            <p class="mt-3 text-gray-500 max-w-2xl mx-auto">
                Kami persembahkan berbagai variasi produk. Terdiri dari beragam ukuran, gaya,
                baik untuk lantai dan dinding yang mampu memenuhi kebutuhan Anda.
            </p>
        </div>

        <!-- Flex Kategori -->
        <div class="flex flex-wrap justify-center gap-8 items-stretch">
            @foreach ($categories as $item)
                <a href="{{ route('produk.byCategory', $item->id) }}" class="block group w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
                        <!-- Gambar Kategori -->
                        <img
                            alt="{{ $item->name }}"
                            src="{{ asset('storage/' . $item->gambar) }}"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300"
                        />
                        <!-- Konten Kategori -->
                        <div class="p-4 flex flex-col flex-grow">
                            <!-- Nama Kategori -->
                            <h3 class="text-lg font-bold text-gray-900 sm:text-xl mb-2">
                                {{ $item->name }}
                            </h3>
                            <!-- Deskripsi Kategori -->
                            <p class="text-gray-700 text-sm sm:text-base line-clamp-3">
                                {{ $item->deskripsi }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach

            @if($categories->isEmpty())
                <p class="text-gray-500 text-center w-full">Tidak ada kategori yang tersedia saat ini.</p>
            @endif
        </div>
    </div>
</section>

<!-- Include Footer -->
@include('footer')
