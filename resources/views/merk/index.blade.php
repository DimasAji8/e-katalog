@include('header')

<section class="bg-transparent py-5">
    <div class="container mx-auto px-10">
        <div class="text-center p-10">
            <h1 class="text-4xl font-bold text-gray-800 lg:text-5xl dark:text-white">PRODUK</h1>
            <p class="mt-3 text-gray-500 w-2/3 mx-auto">Kami persembahkan berbagai variasi produk. Terdiri dari beragam ukuran, gaya,
                baik untuk lantai dan dinding yang mampu memenuhi kebutuhan Anda.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-10">
            @forelse ($merks as $merk)
                <article class="overflow-hidden rounded-lg shadow transition hover:shadow-lg w-full md:w-1/3 lg:w-1/5">
                    <!-- Gambar Merk -->
                    <a href="{{ route('produk.byMerk', ['id' => $merk->id]) }}">
                        <img
                            alt="{{ $merk->nama }}"
                            src="{{ asset('storage/' . $merk->gambar) }}"
                            class="h-56 w-full object-cover"
                        />
                    </a>

                    <div class="bg-white p-4 sm:p-6">
                        <!-- Tanggal -->
                        <time datetime="{{ $merk->created_at->format('Y-m-d') }}" class="block text-xs text-gray-500">
                            {{ $merk->created_at->format('d M Y') }}
                        </time>

                        <!-- Judul Merk -->
                        <a href="{{ route('produk.byMerk', ['id' => $merk->id]) }}">
                            <h3 class="mt-0.5 text-lg text-gray-900">
                                {{ $merk->nama }}
                            </h3>
                        </a>

                        <!-- Deskripsi Merk -->
                        <a href="{{ route('produk.byMerk', ['id' => $merk->id]) }}">
                            <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                                Gambar Merk: {{ $merk->nama ?? 'Deskripsi tidak tersedia.' }}
                            </p>
                        </a>
                    </div>
                </article>
            @empty
                <p class="text-gray-500">Tidak ada merk yang tersedia saat ini.</p>
            @endforelse
        </div>
    </div>
</section>

@include('footer')
