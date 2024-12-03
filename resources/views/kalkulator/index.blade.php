@include('header')

<section class="container mx-auto px-6 py-10">
    <div class="text-center p-7">
        <h1 class="text-4xl font-bold text-gray-800 lg:text-5xl dark:text-white">Kalkulator Keramik</h1>
        <p class="mt-3 text-gray-500 w-2/3 mx-auto mb-4">Hitung jumlah keramik yang Anda butuhkan berdasarkan ukuran bidang dan keramik yang dipilih.</p>
    </div>

    <!-- Formulir Input dan Gambar di Samping -->
    <div class="flex flex-col-reverse gap-5 md:flex-row justify-between space-y-6 md:space-y-0 md:space-x-10">
        <!-- Formulir Kalkulator (Kiri) -->
        <form id="kalkulatorForm" action="/kalkulator" method="POST" class="space-y-6 w-full md:w-1/2 bg-white p-8 rounded-lg shadow-lg border border-gray-300">
            @csrf
            <div class="space-y-6">
                <div class="flex justify-between gap-4">
                    <div class="w-full">
                        <label for="panjang" class="block text-sm font-medium text-gray-700">Panjang (meter)</label>
                        <input type="number" name="panjang" id="panjang" required class="mt-2 w-full border-2 border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300" value="{{ old('panjang', $panjang ?? '') }}" onchange="updateSimulasi()">
                        @error('panjang')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Lebar -->
                    <div class="w-full">
                        <label for="lebar" class="block text-sm font-medium text-gray-700">Lebar (meter)</label>
                        <input type="number" name="lebar" id="lebar" required class="mt-2 w-full border-2 border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300" value="{{ old('lebar', $lebar ?? '') }}" onchange="updateSimulasi()">
                        @error('lebar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Dropdown Ukuran Keramik -->
                <div>
                    <label for="ukuran_keramik" class="block text-sm font-medium text-gray-700">Ukuran Keramik (cm)</label>
                    <select name="ukuran_keramik" id="ukuran_keramik" class="mt-2 w-full border-2 border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300" onchange="updateSimulasi()">
                        <option value="0.04" {{ old('ukuran_keramik', $ukuranKeramik ?? '') == '0.04' ? 'selected' : '' }}>20x20 cm</option>
                        <option value="0.0625" {{ old('ukuran_keramik', $ukuranKeramik ?? '') == '0.0625' ? 'selected' : '' }}>25x25 cm</option>
                        <option value="0.09" {{ old('ukuran_keramik', $ukuranKeramik ?? '') == '0.09' ? 'selected' : '' }}>30x30 cm</option>
                        <option value="0.105" {{ old('ukuran_keramik', $ukuranKeramik ?? '') == '0.105' ? 'selected' : '' }}>32.5x32.5 cm</option>
                        <option value="0.1089" {{ old('ukuran_keramik', $ukuranKeramik ?? '') == '0.1089' ? 'selected' : '' }}>33x33 cm</option>
                        <option value="0.1111" {{ old('ukuran_keramik', $ukuranKeramik ?? '') == '0.1111' ? 'selected' : '' }}>33.3x33.3 cm</option>
                        <option value="0.16" {{ old('ukuran_keramik', $ukuranKeramik ?? '') == '0.16' ? 'selected' : '' }}>40x40 cm</option>
                        <option value="0.2025" {{ old('ukuran_keramik', $ukuranKeramik ?? '') == '0.2025' ? 'selected' : '' }}>45x45 cm</option>
                        <option value="0.25" {{ old('ukuran_keramik', $ukuranKeramik ?? '') == '0.25' ? 'selected' : '' }}>50x50 cm</option>
                        <option value="0.36" {{ old('ukuran_keramik', $ukuranKeramik ?? '') == '0.36' ? 'selected' : '' }}>60x60 cm</option>
                    </select>
                    @error('ukuran_keramik')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hasil Perhitungan Ditampilkan dalam Form -->
                @isset($luasLantai)
                <div class="mt-6 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-800">Hasil Perhitungan:</h2>
                    <div>
                        <label for="luasLantai" class="block text-sm font-medium text-gray-700">Luas Lantai (m²)</label>
                        <input type="text" name="luasLantai" id="luasLantai" class="mt-2 w-full bg-gray-100 text-gray-500 border-gray-300 rounded-md p-3" value="{{ $luasLantai }}" disabled>
                    </div>
                    <div>
                        <label for="jumlahKeramik" class="block text-sm font-medium text-gray-700">Jumlah Keramik (pcs)</label>
                        <input type="text" name="jumlahKeramik" id="jumlahKeramik" class="mt-2 w-full bg-gray-100 text-gray-500 border-gray-300 rounded-md p-3" value="{{ $jumlahKeramik }}" disabled>
                    </div>
                    <div>
                        <label for="jumlahBox" class="block text-sm font-medium text-gray-700">Jumlah Box Keramik (box)</label>
                        <input type="text" name="jumlahBox" id="jumlahBox" class="mt-2 w-full bg-gray-100 text-gray-500 border-gray-300 rounded-md p-3" value="{{ $jumlahBox }}" disabled>
                    </div>
                </div>
                @else
                <p class="mt-4 text-center text-gray-500">Harap Masukkan Data yang Anda Perlukan</p>
                @endisset

                <!-- Tombol Hitung, Reset, dan Cetak PDF -->
                <div class="flex flex-col md:flex-row justify-between gap-4 mt-6">
                    <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-300">
                        Hitung
                    </button>
                    <button type="button" class="px-6 py-3 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-300" onclick="resetHasil()">
                        Reset
                    </button>
                    <button onclick="window.print()" class="px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-300">
                        Cetak PDF
                    </button>
                </div>
            </div>
        </form>

        <!-- Simulasi Bidang (Kanan) -->
        <div class="w-full md:w-1/2 flex justify-center">
            <div id="simulasiBidang" class="w-full max-w-[400px] h-auto object-contain rounded-lg shadow-lg mx-auto md:mx-0"></div>
        </div>
    </div>
</section>

@include('footer')

<style>
    @media print {
        /* Pengaturan Halaman untuk PDF */
        @page {
            size: A4;
            margin: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            padding: 0;
            display: block;
        }

        .flex, .md\:flex-row {
            display: flex;
            flex-direction: row !important;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 0;
        }

        .w-full {
            width: 48% !important; /* Memperbesar area untuk form dan gambar */
        }

        .w-1/2 {
            width: 48% !important; /* Memperbesar area untuk form dan gambar */
        }

        .space-y-6, .space-y-4 {
            margin-bottom: 0;
        }

        .gap-5 {
            margin-bottom: 0;
        }

        .footer {
            display: none;
        }

        .form-section {
            page-break-before: always;
        }

        .form-section > div:last-child {
            page-break-after: always;
        }

        /* Memastikan kedua elemen berada di samping satu sama lain */
        .flex {
            flex-wrap: nowrap;
            justify-content: space-between;
        }
    }
</style>


<script>
    function updateSimulasi() {
        const panjang = parseFloat(document.getElementById("panjang").value) || 0;
        const lebar = parseFloat(document.getElementById("lebar").value) || 0;
        const ukuranKeramik = parseFloat(document.getElementById("ukuran_keramik").value) || 0;

        if (panjang && lebar && ukuranKeramik) {
            const panjangCm = panjang * 100; // Convert panjang ke cm
            const lebarCm = lebar * 100; // Convert lebar ke cm
            const luasLantai = panjang * lebar;
            const jumlahKeramik = Math.ceil(luasLantai / ukuranKeramik);
            const jumlahBox = Math.ceil(jumlahKeramik / 10); // Misal 1 box berisi 10 keramik

            // Update input dan output
            document.getElementById("luasLantai").value = luasLantai.toFixed(2);
            document.getElementById("jumlahKeramik").value = jumlahKeramik;
            document.getElementById("jumlahBox").value = jumlahBox;

            // Update simulasi
            const simulasikan = document.getElementById("simulasiBidang");
            simulasikan.innerHTML = ''; // Clear previous simulation

            const keramikSize = Math.sqrt(ukuranKeramik) * 100; // Ukuran keramik dalam px
            const rows = Math.floor(lebarCm / keramikSize);
            const cols = Math.floor(panjangCm / keramikSize);

            for (let i = 0; i < rows; i++) {
                const row = document.createElement('div');
                row.style.display = 'flex';
                for (let j = 0; j < cols; j++) {
                    const keramik = document.createElement('div');
                    keramik.style.width = `${keramikSize}px`;
                    keramik.style.height = `${keramikSize}px`;
                    keramik.style.backgroundColor = '#a0a0a0';
                    keramik.style.margin = '1px';
                    keramik.style.border = '1px solid #777';
                    row.appendChild(keramik);
                }
                simulasikan.appendChild(row);
            }
        }
    }

    function resetHasil() {
        // Reset form fields and results
        document.getElementById("kalkulatorForm").reset();
        document.getElementById("simulasiBidang").innerHTML = '';
        document.getElementById("luasLantai").value = '';
        document.getElementById("jumlahKeramik").value = '';
        document.getElementById("jumlahBox").value = '';

        // Reset input manually
        document.getElementById("panjang").value = '';
        document.getElementById("lebar").value = '';
        document.getElementById("ukuran_keramik").selectedIndex = 0; // Reset to first option
    }

    // Panggil updateSimulasi pertama kali untuk memulai simulasi
    updateSimulasi();
</script>
