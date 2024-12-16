@include('header')

<section class="bg-transparent py-5">
    <div class="container mx-auto px-10">
        <div class="text-center p-10">
            <h1 class="text-4xl font-bold text-gray-800 lg:text-5xl dark:text-white">PRODUK</h1>
            <p class="mt-3 text-gray-500 w-2/3 mx-auto">
                Kami persembahkan berbagai variasi produk. Terdiri dari beragam ukuran, gaya,
                baik untuk lantai dan dinding yang mampu memenuhi kebutuhan kamu.
            </p>
        </div>

        <!-- Menampilkan Produk Berdasarkan Merk -->
        <div x-data="carousel({{ count($merks) }})" class="relative overflow-hidden">
            <!-- Carousel Container -->
            <div class="flex transition-transform duration-500 ease-in-out"
                :style="{ transform: `translateX(-${currentSlide * cardWidth}px)` }">
                @foreach ($merks as $merk)
                    <div class="w-full flex-none md:w-1/3 lg:w-1/5" style="min-width: 300px;">
                        <article class="overflow-hidden rounded-lg shadow-2xl transition hover:translate-x-3 mx-3">
                            <!-- Gambar Merk -->
                            <a href="{{ route('produk.byMerk', ['id' => $merk->id]) }}">
                                <img
                                    alt="{{ $merk->nama }}"
                                    src="{{ asset('storage/' . $merk->gambar) }}"
                                    class="h-56 w-full object-cover"
                                />
                            </a>
                            <div class="bg-white p-4 sm:p-6">
                                <!-- Judul Merk -->
                                <a href="{{ route('produk.byMerk', ['id' => $merk->id]) }}">
                                    <h3 class="mt-0.5 text-lg text-gray-900 text-center font-bold">
                                        {{ $merk->nama }}
                                    </h3>
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Buttons -->
            <button
                @click="prev()"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 p-2 bg-gray-700 text-white rounded-full shadow-lg">
                &#8592;
            </button>
            <button
                @click="next()"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 p-2 bg-gray-700 text-white rounded-full shadow-lg">
                &#8594;
            </button>
        </div>
        <!-- Akhir Menampilkan Produk Berdasarkan Merk -->

        <!-- Menampilkan Semua Produk -->
        <div class="mt-16 w-full">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Semua Produk</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 justify-items-center">
                @foreach ($produks as $produk)
                    <!-- Seluruh card dibungkus dalam <a> yang mengarah ke produk detail -->
                    <a href="{{ route('produk.detail', ['id' => $produk->id]) }}" class="w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        <img class="object-cover object-center w-full h-56" src="{{ asset('storage/' . $produk->getFirstImageAttribute()) }}" alt="{{ $produk->nama }}">

                        <div class="px-6 py-4">
                            <div class="text-center">
                                <h1 class="text-xl font-semibold text-primary dark:text-white">{{ $produk->name }}</h1>
                                <p class="text-gray-700 dark:text-gray-400">{{ $produk->desain }}</p>
                            </div>

                            <div class="flex gap-2 justify-evenly">
                                <h1 class="text-sm">{{ $produk->ukuran }}</h1>
                                <h1 class="text-sm">{{ $produk->sentuhan_akhir }}</h1>
                            </div>
                        
                            <div class="flex items-center mt-2 text-gray-700 dark:text-gray-200 justify-center">
                                <img src="{{ asset('img/money.svg') }}" alt="money icon" class="w-6 h-6">
                                <h1 class="px-2 text-sm">{{ $produk->price }}</h1>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <!-- Akhir Menampilkan Semua Produk -->

    </div>
</section>

@include('footer')

<script>
    function carousel(totalCards) {
        return {
            currentSlide: 0,
            cardWidth: 300, // Sesuaikan dengan min-width kartu
            totalCards: totalCards,
            next() {
                if (this.currentSlide < this.totalCards - 1) {
                    this.currentSlide++;
                }
            },
            prev() {
                if (this.currentSlide > 0) {
                    this.currentSlide--;
                }
            }
        }
    }
</script>
