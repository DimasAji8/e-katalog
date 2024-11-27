<!-- Include Header -->
@include('header')

<section class="bg-transparent py-10">
    <div class="container mx-auto">
        <div class="flex justify-between">
            <div class="w-full md:w-2/3">
                <!-- Gambar Produk -->
                <img
                    alt="{{ $product->nama }}"
                    src="{{ asset('storage/' . $product->getFirstImageAttribute()) }}"
                    class="w-full object-cover h-80 md:h-96"
                />
                <div class="mt-5">
                    <!-- Nama Produk -->
                    <h1 class="text-3xl font-bold text-gray-800">{{ $product->nama }}</h1>

                    <!-- Deskripsi Produk -->
                    <p class="mt-3 text-lg text-gray-700">{{ $product->deskripsi ?? 'Deskripsi produk tidak tersedia.' }}</p>

                    <!-- Informasi Lain (Harga, Ukuran, dll) -->
                    <div class="mt-4">
                        <p class="text-sm text-gray-600"><strong>Harga:</strong> Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-600"><strong>Ukuran:</strong> {{ $product->ukuran }}</p>
                        <p class="text-sm text-gray-600"><strong>Penggunaan:</strong> {{ $product->penggunaan }}</p>
                        <p class="text-sm text-gray-600"><strong>Desain:</strong> {{ $product->desain }}</p>
                        <p class="text-sm text-gray-600"><strong>Permukaan:</strong> {{ $product->permukaan }}</p>
                    </div>

                    <!-- Gambar Tambahan (Jika ada) -->
                    @if (!empty($product->images))
                        <div class="mt-5">
                            <h3 class="font-semibold text-gray-800">Gambar Lainnya</h3>
                            <div class="flex gap-4 mt-2">
                                @foreach ($product->images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="Gambar Produk" class="w-24 h-24 object-cover rounded">
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="w-full md:w-1/3 mt-10 md:mt-0">
                <!-- Info Merk -->
                <div class="bg-white p-5 shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-800">Merk: {{ $product->merk->nama }}</h3>
                    <p class="text-sm text-gray-600">{{ $product->merk->deskripsi ?? 'Deskripsi merk tidak tersedia.' }}</p>
                </div>

                <!-- Info Kategori -->
                <div class="bg-white p-5 mt-5 shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-800">Kategori: {{ $product->kategori->nama }}</h3>
                    <p class="text-sm text-gray-600">{{ $product->kategori->deskripsi ?? 'Deskripsi kategori tidak tersedia.' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Footer -->
@include('footer')
