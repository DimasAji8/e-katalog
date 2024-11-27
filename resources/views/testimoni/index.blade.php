<!-- Include Header -->
@include('header')


<!-- Menampilkan pesan sukses jika ada -->
@if(session('message'))
    <div class="alert alert-success p-4 mb-4 bg-green-100 text-green-700 border border-green-300 rounded-md">
        {{ session('message') }}
    </div>
@endif

<section class="bg-gray-100">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
        <div class="lg:col-span-2 lg:py-12">
          <p class="max-w-xl text-lg">
            At the same time, the fact that we are wholly owned and totally independent from
            manufacturer and other group control gives you confidence that we will only recommend what
            is right for you.
          </p>
  
          <div class="mt-8">
            <a href="#" class="text-2xl font-bold text-pink-600"> 0151 475 4450 </a>
  
            <address class="mt-2 not-italic">282 Kevin Brook, Imogeneborough, CA 58517</address>
          </div>
        </div>
  
        <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
          <form action="{{ route('review.store') }}" method="POST" class="space-y-4">
            @csrf <!-- CSRF Token -->
  
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <div>
                <label class="sr-only" for="name">Nama</label>
                <input
                  class="w-full rounded-lg border-gray-200 p-3 text-sm"
                  placeholder="Masukkan nama anda"
                  type="text"
                  id="name"
                  name="name"
                  required
                />
              </div>
  
              <div>
                <label class="sr-only" for="email">Email</label>
                <input
                  class="w-full rounded-lg border-gray-200 p-3 text-sm"
                  placeholder="Masukkan email anda"
                  type="email"
                  id="email"
                  name="email"
                  required
                />
              </div>
            </div>
  
            <div>
              <label class="sr-only" for="deskripsi">Deskripsi</label>
  
              <textarea
                class="w-full rounded-lg border-gray-200 p-3 text-sm"
                placeholder="Masukkan deskripsi testimoni anda"
                rows="8"
                id="deskripsi"
                name="content"
                required
              ></textarea>
            </div>
  
            <div class="mt-4">
              <button
                type="submit"
                class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto"
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
