<!-- Include Header -->
@include('header')

<section class="bg-transparent py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row justify-between gap-10">
            <!-- Kolom Kiri: Gambar dan Deskripsi Produk -->
            <div class="w-full lg:w-2/3">
                <!-- Gambar Produk -->
                <div class="relative w-full h-[300px] md:h-[300px] flex justify-center items-center"> <!-- Menjaga gambar tetap persegi dan berada di tengah -->
                    <img
                        alt="{{ $product->nama }}"
                        src="{{ asset('storage/' . $product->getFirstImageAttribute()) }}"
                        class="w-[300px] h-[300px] object-cover rounded-lg shadow-lg" /> <!-- Ukuran persegi dan objek gambar menutupi area -->
                </div>

                <div class="mt-6">
                    <!-- Nama Produk -->
                    <h1 class="text-3xl font-bold text-gray-800">{{ $product->nama }}</h1>

                    <!-- Deskripsi Produk -->
                    <p class="mt-4 text-lg text-gray-700">{{ $product->description ?? 'Deskripsi produk tidak tersedia.' }}</p>

                    <!-- Informasi Lain (Harga, Ukuran, dll) -->
                    <div class="mt-6 space-y-2">
                        <p class="text-sm text-gray-600"><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-600"><strong>Ukuran:</strong> {{ $product->ukuran }}</p>
                        <p class="text-sm text-gray-600"><strong>Penggunaan:</strong> {{ $product->penggunaan }}</p>
                        <p class="text-sm text-gray-600"><strong>Desain:</strong> {{ $product->desain }}</p>
                        <p class="text-sm text-gray-600"><strong>Permukaan:</strong> {{ $product->permukaan }}</p>
                    </div>

                    <!-- Gambar Tambahan (Jika ada) -->
                    @if (!empty($product->images))
                        <div class="mt-6">
                            <h3 class="font-semibold text-gray-800">Gambar Lainnya</h3>
                            <div class="flex gap-4 mt-4">
                                @foreach ($product->images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="Gambar Produk" class="w-[80px] h-[80px] object-cover rounded-lg shadow-md hover:scale-105 transition-all"> <!-- Ukuran gambar thumbnail tetap -->
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Kolom Kanan: Info Merk dan Kategori -->
            <div class="w-full lg:w-1/3 mt-10 lg:mt-0">
                <!-- Info Merk -->
                <div class="bg-white p-6 shadow-lg rounded-lg mb-6">
                    <h3 class="text-xl font-semibold text-gray-800">Merk: {{ $product->merk->nama }}</h3>
                    <!-- <p class="text-sm text-gray-600">{{ $product->merk->description ?? 'Deskripsi merk tidak tersedia.' }}</p> -->
                </div>

                <!-- Info Kategori -->
                <div class="bg-white p-6 shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-800">Kategori: {{ $product->kategori->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $product->kategori->deskripsi ?? 'Deskripsi kategori tidak tersedia.' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Footer -->
@include('footer')
