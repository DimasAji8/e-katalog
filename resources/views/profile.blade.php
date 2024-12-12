<div class="container px-6 py-16 mx-auto">
    <div class="items-center lg:flex">
        <div class="flex items-center justify-center w-full mt-6 lg:mt-0 lg:w-1/2">
            <img class="w-96" src="{{ asset('RYAN LOGO.png') }}" alt="RYAN LOGO">
        </div>
        <div class="w-full lg:w-1/2 lg:mx-10">
            @foreach($tentang as $item)
            <div class="lg:max-w-lg">
                <h1 class="text-3xl font-semibold text-gray-800 dark:text-white lg:text-4xl">{{ $item->judul }}</h1>
                <p class="mt-3 text-gray-600 dark:text-gray-400 text-sm md:text-lg text-justify">{{ $item->isi }}</p>
                <br>
                <a href="/merk" class="w-full px-5 py-2 mt-6 text-sm tracking-wider text-white uppercase transition-colors duration-300 transform bg-primary rounded-lg lg:w-auto hover:bg-red-800 focus:outline-none focus:bg-red-700">
                    Lihat Produk
                </a>                
            </div>
            @endforeach
        </div>
    </div>
</div>
