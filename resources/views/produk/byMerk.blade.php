<!-- Include Header -->
@include('header')

<section class="bg-transparent py-10">
    <div class="container mx-auto">
        <div class="text-center p-5">
            <h1 class="text-4xl font-bold text-gray-800 lg:text-5xl dark:text-white">{{ $merk->nama }}</h1>
            <p class="mt-3 text-gray-500 w-2/3 mx-auto">{{ $merk->deskripsi ?? 'Deskripsi tidak tersedia' }}</p>
        </div>

        <div class="flex flex-wrap justify-center gap-10">
            @forelse ($products as $product)
                <article class="overflow-hidden rounded-lg shadow transition hover:shadow-lg w-full md:w-1/3 lg:w-1/5">
                    <!-- Tautan ke Halaman Detail Produk -->
                    <a href="{{ route('produk.detail', $product->id) }}">
                        <!-- Gambar Produk -->
                        <img
                            alt="{{ $product->nama }}"
                            src="{{ asset('storage/' . $product->getFirstImageAttribute()) }}"
                            class="h-56 w-full object-cover"
                        />
                    </a>

                    <div class="bg-white p-4 sm:p-6">
                        <!-- Nama Produk dengan Tautan ke Detail -->
                        <a href="{{ route('produk.detail', $product->id) }}">
                            <h3 class="mt-0.5 text-lg text-gray-900">{{ $product->nama }}</h3>
                        </a>

                        <!-- Deskripsi Produk -->
                        <p class="mt-2 text-sm/relaxed text-gray-500">
                            {{ $product->deskripsi ?? 'Deskripsi produk tidak tersedia.' }}
                        </p>
                    </div>
                </article>
            @empty
                <p class="text-gray-500">Tidak ada produk yang tersedia di merk ini.</p>
            @endforelse
        </div>
    </div>
</section>

<!-- Include Footer -->
@include('footer')
