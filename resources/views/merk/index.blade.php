@include('header')

<section class="bg-transparent py-5">
    <div class="container mx-auto px-10">
        <div class="text-center md:p-10 p-2">
            <h1 class="text-4xl font-bold text-gray-800 lg:text-5xl dark:text-white">PRODUK</h1>
            <p class="mt-3 text-gray-500">
                Kami persembahkan berbagai variasi produk. Terdiri dari beragam ukuran, gaya,
                baik untuk lantai dan dinding yang mampu memenuhi kebutuhan kamu.
            </p>
        </div>

        <!-- Carousel Container -->
<div x-data="carousel({{ count($merks) }})" class="relative overflow-hidden">
    <!-- Carousel Wrapper -->
    <div class="flex transition-transform duration-500 ease-in-out"
        :style="{ transform: `translateX(-${currentSlide * cardWidth}px)` }">
        @foreach ($merks as $merk)
            <div class="w-full flex-none md:w-1/3 lg:w-1/5" style="min-width: 300px;">
                <article class="overflow-hidden rounded-lg shadow-2xl transition hover:translate-x-3 mx-3">
                    <a href="{{ route('produk.byMerk', ['id' => $merk->id]) }}">
                        <img
                            alt="{{ $merk->nama }}"
                            src="{{ asset('storage/' . $merk->gambar) }}"
                            class="h-56 w-full object-cover"
                        />
                    </a>
                    <div class="bg-white p-4 sm:p-6">
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

    <!-- Navigation Buttons -->
    <button 
        @click="prev()" 
        class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow-lg transition-colors duration-200 group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 group-hover:text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button 
        @click="next()" 
        class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow-lg transition-colors duration-200 group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 group-hover:text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
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
    function carousel(totalItems) {
        return {
            currentSlide: 0,
            cardWidth: 300,
            totalItems: totalItems,
            visibleItems: 5, // Jumlah item yang terlihat di desktop

            next() {
                if (this.currentSlide >= this.totalItems - this.visibleItems) {
                    // Kembali ke awal jika sudah di slide terakhir
                    this.currentSlide = 0;
                } else {
                    this.currentSlide++;
                }
            },
            
            prev() {
                if (this.currentSlide <= 0) {
                    // Pergi ke slide terakhir jika di awal
                    this.currentSlide = this.totalItems - this.visibleItems;
                } else {
                    this.currentSlide--;
                }
            },

            // Menghitung jumlah item yang terlihat berdasarkan ukuran layar
            init() {
                this.updateVisibleItems();
                window.addEventListener('resize', () => this.updateVisibleItems());
            },

            updateVisibleItems() {
                if (window.innerWidth < 768) {
                    this.visibleItems = 1; // Mobile
                } else if (window.innerWidth < 1024) {
                    this.visibleItems = 3; // Tablet
                } else {
                    this.visibleItems = 5; // Desktop
                }
                
                // Pastikan currentSlide tidak melebihi batas
                if (this.currentSlide > this.totalItems - this.visibleItems) {
                    this.currentSlide = this.totalItems - this.visibleItems;
                }
            }
        }
    }
</script>