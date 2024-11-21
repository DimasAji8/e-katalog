 <!-- Include Header -->
 @include('header')

    <!-- Carousel Section -->
    <div x-data="{ currentIndex: 0, images: ['/img/image1.jpg', '/img/image2.jpg', '/img/image3.jpg'] }" class="mt-10 relative flex justify-center items-center">
        <!-- Carousel Images -->
        <div class="relative overflow-hidden w-full max-w-3xl">
            <div :style="`transform: translateX(-${currentIndex * 100}%)`" class="flex transition-transform duration-500">
                <template x-for="(image, index) in images" :key="index">
                    <div class="w-full">
                        <img :src="image" alt="Carousel Image" class="w-full h-64 object-cover">
                    </div>
                </template>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <button @click="currentIndex = (currentIndex === 0 ? images.length - 1 : currentIndex - 1)"
                class="absolute top-1/2 left-20 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full">
            &#10094;
        </button>
        <button @click="currentIndex = (currentIndex === images.length - 1 ? 0 : currentIndex + 1)"
                class="absolute top-1/2 right-20 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full">
            &#10095;
        </button>
    </div>

    <!-- Include Footer -->
    @include('footer')
