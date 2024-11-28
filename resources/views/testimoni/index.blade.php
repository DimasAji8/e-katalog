<!-- Include Header -->
@include('header')

<!-- Menampilkan pesan sukses jika ada -->
@if(session('message'))
    <div class="alert alert-success p-4 mb-4 bg-green-100 text-green-700 border border-green-300 rounded-md">
        {{ session('message') }}
    </div>
@endif
    
<section class="bg-gray-100 py-16">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
            <div class="lg:col-span-2 lg:py-12">
                <p class="max-w-xl text-lg text-gray-700">
                    Kami selalu berusaha memberikan rekomendasi yang tepat untuk Anda, karena kami sepenuhnya independen dan hanya mempercayakan pada kualitas terbaik untuk Anda.
                </p>

                <div class="mt-8">
                    <a href="tel:+01514754450" class="text-2xl font-bold text-pink-600"> 0151 475 4450 </a>

                    <address class="mt-2 text-gray-700 not-italic">282 Kevin Brook, Imogeneborough, CA 58517</address>
                </div>
            </div>

            <div class="rounded-lg bg-white p-8 shadow-xl lg:col-span-3 lg:p-12">
                <form action="{{ route('review.store') }}" method="POST" class="space-y-6">
                    @csrf <!-- CSRF Token -->

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="name">Nama</label>
                            <input
                                class="w-full rounded-lg border-2 border-gray-300 focus:border-pink-600 focus:ring-2 focus:ring-pink-500 p-3 text-sm transition-all"
                                placeholder="Masukkan nama anda"
                                type="text"
                                id="name"
                                name="name"
                                required
                            />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                            <input
                                class="w-full rounded-lg border-2 border-gray-300 focus:border-pink-600 focus:ring-2 focus:ring-pink-500 p-3 text-sm transition-all"
                                placeholder="Masukkan email anda"
                                type="email"
                                id="email"
                                name="email"
                                required
                            />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700" for="deskripsi">Deskripsi</label>

                        <textarea
                            class="w-full rounded-lg border-2 border-gray-300 focus:border-pink-600 focus:ring-2 focus:ring-pink-500 p-3 text-sm transition-all"
                            placeholder="Masukkan deskripsi testimoni anda"
                            rows="6"
                            id="deskripsi"
                            name="content"
                            required
                        ></textarea>
                    </div>

                    <div class="mt-6">
                        <button
                            type="submit"
                            class="inline-block w-full rounded-lg bg-pink-600 px-6 py-3 font-medium text-white sm:w-auto hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500"
                        >
                            Kirim Testimoni
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Include Footer -->
@include('footer')
