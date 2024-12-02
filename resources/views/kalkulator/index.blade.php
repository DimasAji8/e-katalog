@include('header')

<section class="container mx-auto px-6 py-10">
    <div class="text-center p-7">
        <h1 class="text-4xl font-bold text-gray-800 lg:text-5xl dark:text-white">Kalkulator Keramik</h1>
        <p class="mt-3 text-gray-500 w-2/3 mx-auto">Hitung jumlah keramik yang Anda butuhkan berdasarkan ukuran bidang dan keramik yang dipilih.</p>
    </div>

    <!-- Formulir Input dan Gambar di Samping -->
    <div class="flex justify-between space-x-10">
        <!-- Formulir Kalkulator (Kiri) -->
        <form action="/kalkulator" method="POST" class="space-y-6 w-1/2 bg-white p-6 rounded-lg shadow-md border border-gray-300">
            @csrf
            <div class="space-y-4">
                <!-- Input Panjang -->
                <div>
                    <label for="panjang" class="block text-sm font-medium">Panjang (meter)</label>
                    <input type="number" name="panjang" id="panjang" required class="mt-1 block w-full border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('panjang') }}" onchange="updateSimulasi()">
                    @error('panjang')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Lebar -->
                <div>
                    <label for="lebar" class="block text-sm font-medium">Lebar (meter)</label>
                    <input type="number" name="lebar" id="lebar" required class="mt-1 block w-full border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('lebar') }}" onchange="updateSimulasi()">
                    @error('lebar')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dropdown Ukuran Keramik -->
                <div>
                    <label for="ukuran_keramik" class="block text-sm font-medium">Ukuran Keramik (cm)</label>
                    <select name="ukuran_keramik" id="ukuran_keramik" class="mt-1 block w-full border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" onchange="updateSimulasi()">
                        <option value="0.04">20x20 cm</option>
                        <option value="0.0625">25x25 cm</option>
                        <option value="0.09">30x30 cm</option>
                        <option value="0.105">32.5x32.5 cm</option>
                        <option value="0.1089">33x33 cm</option>
                        <option value="0.1111">33.3x33.3 cm</option>
                        <option value="0.16">40x40 cm</option>
                        <option value="0.2025">45x45 cm</option>
                        <option value="0.25">50x50 cm</option>
                        <option value="0.36">60x60 cm</option>
                    </select>
                    @error('ukuran_keramik')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 w-full">
                    Hitung
                </button>
            </div>

            <!-- Hasil Perhitungan Ditampilkan dalam Form -->
            @isset($luasLantai)
                <div class="mt-4">
                    <h2 class="text-lg font-semibold">Hasil Perhitungan:</h2>
                    <p>Luas Lantai: <strong>{{ $luasLantai }} m²</strong></p>
                    <p>Jumlah Keramik yang Diperlukan: <strong>{{ $jumlahKeramik }} pcs</strong></p>
                    <p>Jumlah Box Keramik: <strong>{{ $jumlahBox }} box</strong></p>
                </div>
            @else
                <p class="mt-4 text-center text-gray-500">Hasil perhitungan belum tersedia. Coba masukkan data dan hitung.</p>
            @endisset
        </form>

        <!-- Gambar (Kanan) -->
        <div class="w-1/2">
            <img src="{{ asset('gambar samping kalkulator.jpg') }}" alt="Gambar Kalkulator Keramik" class="w-full max-w-[400px] h-auto object-contain rounded-lg shadow-lg">
        </div>
    </div>
</section>

@include('footer')
