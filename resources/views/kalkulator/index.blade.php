@include('header')

<section class="container mx-auto px-6 py-10">
    <div class="text-center p-7">
        <h1 class="text-4xl font-bold text-gray-800 lg:text-5xl dark:text-white">Kalkulator Keramik</h1>
        <p class="mt-3 text-gray-500 w-2/3 mx-auto mb-4">Hitung jumlah keramik yang Anda butuhkan berdasarkan ukuran bidang dan keramik yang dipilih.</p>
    </div>

    <!-- Formulir Input dan Simulasi -->
    <div class="flex flex-col-reverse gap-5 md:flex-row justify-between space-y-6 md:space-y-0 md:space-x-10">
        <!-- Formulir Kalkulator (Kiri) -->
        <form id="kalkulatorForm" action="/kalkulator" method="POST" class="space-y-6 w-full md:w-1/2 bg-white p-8 rounded-lg shadow-lg border border-gray-300">
            @csrf
            <div class="space-y-6">
                <div class="flex justify-between gap-4">
                    <div class="w-full">
                        <label for="panjang" class="block text-sm font-medium text-gray-700">Panjang (meter)</label>
                        <input type="number" name="panjang" id="panjang" required step="0.01" min="0.1" class="mt-2 w-full border-2 border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300">
                        @error('panjang')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label for="lebar" class="block text-sm font-medium text-gray-700">Lebar (meter)</label>
                        <input type="number" name="lebar" id="lebar" required step="0.01" min="0.1" class="mt-2 w-full border-2 border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300">
                        @error('lebar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="ukuran_keramik" class="block text-sm font-medium text-gray-700">Ukuran Keramik (cm)</label>
                    <select name="ukuran_keramik" id="ukuran_keramik" class="mt-2 w-full border-2 border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300">
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
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hasil Perhitungan -->
                <div class="mt-6 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-800">Hasil Perhitungan:</h2>
                    <div>
                        <label for="luasLantai" class="block text-sm font-medium text-gray-700">Luas Lantai (m²)</label>
                        <input type="text" id="luasLantai" class="mt-2 w-full bg-gray-100 text-gray-500 border-gray-300 rounded-md p-3" readonly>
                    </div>
                    <div>
                        <label for="jumlahKeramik" class="block text-sm font-medium text-gray-700">Jumlah Keramik (pcs)</label>
                        <input type="text" id="jumlahKeramik" class="mt-2 w-full bg-gray-100 text-gray-500 border-gray-300 rounded-md p-3" readonly>
                    </div>
                    <div>
                        <label for="jumlahBox" class="block text-sm font-medium text-gray-700">Jumlah Box Keramik (box)</label>
                        <input type="text" id="jumlahBox" class="mt-2 w-full bg-gray-100 text-gray-500 border-gray-300 rounded-md p-3" readonly>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-col md:flex-row justify-between gap-4 mt-6">
                    <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-300">
                        Hitung
                    </button>
                    <button type="button" class="px-6 py-3 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-300" onclick="resetForm()">
                        Reset
                    </button>
                    <button type="button" onclick="window.print()" class="px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-300">
                        Cetak PDF
                    </button>
                </div>
            </div>
        </form>

        <!-- Simulasi Bidang (Kanan) -->
        <div class="w-full md:w-1/2 flex justify-center items-center">
            <div class="bg-gray-50 rounded-lg shadow-lg p-4 w-full">
                <div class="text-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Simulasi Tata Letak Keramik</h3>
                    <p class="text-sm text-gray-500">Visualisasi penyusunan keramik pada bidang</p>
                </div>
                
                <div id="simulasiContainer" class="w-full aspect-square max-w-[400px] mx-auto bg-white rounded-lg border-2 border-gray-300 overflow-hidden">
                    <div id="simulasiBidang" class="w-full h-full flex flex-col"></div>
                </div>
                
                <div class="mt-4 text-center text-sm text-gray-600">
                    <p>* Gambar disesuaikan dengan skala</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('footer')

<style>
    @media print {
        @page {
            size: A4;
            margin: 2cm;
        }

        body {
            font-family: 'Arial', sans-serif;
        }

        .container {
            width: 100%;
            max-width: none;
            padding: 0;
        }

        .flex {
            display: flex !important;
            flex-direction: row !important;
        }

        .md\:w-1/2 {
            width: 50% !important;
        }

        .shadow-lg {
            box-shadow: none !important;
        }

        button {
            display: none !important;
        }

        /* Sembunyikan seluruh bagian simulasi bidang */
        .md\:w-1\/2.flex.justify-center.items-center {
            display: none !important;
        }

        .text-gray-500 {
            color: #000 !important;
        }
    }
</style>


<script>
function handleSubmit(event) {
    event.preventDefault(); // Menghentikan form dari pengiriman otomatis

    const panjang = parseFloat(document.getElementById("panjang").value) || 0;
    const lebar = parseFloat(document.getElementById("lebar").value) || 0;
    const ukuranKeramik = parseFloat(document.getElementById("ukuran_keramik").value) || 0;
    
    const simulasiBidang = document.getElementById("simulasiBidang");
    const container = document.getElementById("simulasiContainer");
    
    if (panjang && lebar && ukuranKeramik) {
        // Bersihkan simulasi sebelumnya
        simulasiBidang.innerHTML = '';
        
        // Konversi ke sentimeter
        const panjangCm = panjang * 100;
        const lebarCm = lebar * 100;
        
        // Hitung jumlah keramik
        const ukuranKeramikCm = Math.sqrt(ukuranKeramik) * 100;
        const jumlahBaris = Math.ceil(lebarCm / ukuranKeramikCm);
        const jumlahKolom = Math.ceil(panjangCm / ukuranKeramikCm);
        
        // Update perhitungan
        const luasLantai = panjang * lebar;
        const jumlahKeramik = Math.ceil(luasLantai / ukuranKeramik);
        const jumlahBox = Math.ceil(jumlahKeramik / 10); // Asumsi 10 keramik per box

        // Update input hasil
        document.getElementById("luasLantai").value = luasLantai.toFixed(2);
        document.getElementById("jumlahKeramik").value = jumlahKeramik;
        document.getElementById("jumlahBox").value = jumlahBox;
        
        // Setup grid
        simulasiBidang.style.display = 'grid';
        simulasiBidang.style.gridTemplateColumns = `repeat(${jumlahKolom}, 1fr)`;
        simulasiBidang.style.gap = '1px';
        simulasiBidang.style.padding = '4px';
        
        // Generate keramik
        for (let i = 0; i < (jumlahBaris * jumlahKolom); i++) {
            const keramik = document.createElement('div');
            keramik.className = 'bg-gray-200 hover:bg-gray-300 transition-colors duration-200';
            keramik.style.aspectRatio = '1';
            simulasiBidang.appendChild(keramik);
        }
    }
}

function resetForm() {
    document.getElementById("kalkulatorForm").reset();
    document.getElementById("simulasiBidang").innerHTML = '';
    
    const fields = ['luasLantai', 'jumlahKeramik', 'jumlahBox'];
    fields.forEach(field => {
        const element = document.getElementById(field);
        if (element) element.value = '';
    });
}

// Event listeners
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("kalkulatorForm");
    form.addEventListener("submit", handleSubmit);
});
</script>
