<footer class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-8 mx-auto">
        <div class="flex flex-col items-center text-center">
            <a href="#">
                <img src="{{ asset('RYAN PUTRA.png') }}" width="200" alt="RYAN PUTRA LOGO">
            </a>

            <div class="flex flex-wrap justify-center mt-6 -mx-4">
                <a href="/" class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Beranda"> Beranda </a>
                <a href="/kategori" class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Kategori"> Kategori </a>
                <a href="/produk" class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Produk"> Produk </a>
                <a href="/berita" class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Berita"> Berita </a>
                <a href="/gallery" class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Galeri"> Galeri </a>
                <a href="/testimoni" class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Testimoni"> Testimoni </a>
                <a href="/testimoni" class="mx-4 text-sm text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400" aria-label="Kalkulator"> Kalkulator </a>
            </div>
        </div>

        <hr class="my-6 border-gray-200 md:my-10 dark:border-gray-700" />

        <div class="flex flex-col items-center sm:flex-row sm:justify-between">
            <p class="text-sm text-gray-500 dark:text-gray-300">© Copyright 2024. All Rights Reserved.</p>

            <div class="flex -mx-2">
                {{-- Instagram --}}
                <a href="https://instagram.com/{{ $kontak->instagram }}" class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400" aria-label="Instagram">
                    <img class="w-5 h-5 fill-current" src="{{ asset('img/instagramIcon.svg') }}" alt="instagram icon">
                </a>

                <!-- TikTok -->
                <a href="https://tiktok.com/@{{ $kontak->tiktok }}" class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400" aria-label="TikTok">
                    <img class="w-5 h-5 fill-current" src="{{ asset('img/tiktokIcon.svg') }}" alt="tiktok icon">
                </a>

                <!-- Facebook -->
                <a href="https://facebook.com/{{ $kontak->facebook }}" class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400" aria-label="Facebook">
                    <img class="w-5 h-5 fill-current" src="{{ asset('img/facebookIcon.svg') }}" alt="facebook icon">
                </a>

                <!-- Shopee -->
                <a href="https://shopee.co.id/{{ $kontak->shopee }}" class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400" aria-label="Shopee">
                    <img class="w-5 h-5 fill-current" src="{{ asset('img/shopeeIcon.svg') }}" alt="shopee icon">
                </a>

                <!-- Tokopedia -->
                <a href="https://tokopedia.com/{{ $kontak->tokped }}" class="mx-2 text-gray-600 transition-colors duration-300 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400" aria-label="Tokopedia">
                    <img class="w-5 h-5 fill-current" src="{{ asset('img/tokopediaIcon.svg') }}" alt="tokopedia icon">
                </a>
            </div>
        </div>
    </div>
</footer>
