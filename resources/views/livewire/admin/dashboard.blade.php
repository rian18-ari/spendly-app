<div>
    <!-- Contoh Kartu Dashboard -->
    <div class="grid grid-cols-3 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="p-6 rounded-xl shadow-lg border-2 bg-amber-50 col-span-4">
            <p class="text-sm font-medium text-gray-500">Saldo saat ini</p>
            <p class="text-3xl font-bold text-cyan-900 mt-1">Rp.
                {{ number_format($budgetmaster->budget, 0, ',', '.') }};</p>
            <p class="text-xs text-green-500 mt-2">+12% dari kemarin</p>
        </div>
        <div class="p-6 rounded-xl shadow-lg border-2 bg-amber-50">
            <p class="text-sm font-medium text-gray-500">Pengeluaran (Bulan Ini)</p>
            <p class="text-3xl font-bold text-cyan-900 mt-1">Rp. {{ number_format($total_pengeluaran, 0, ',', '.') }};
            </p>
            <p class="text-xs text-red-500 mt-2">-5% dari bulan lalu</p>
        </div>
        <div class="p-6 rounded-xl shadow-lg border-2 bg-amber-50">
            <p class="text-sm font-medium text-gray-500">Pengguna Baru</p>
            <p class="text-3xl font-bold text-cyan-900 mt-1">459</p>
            <p class="text-xs text-green-500 mt-2">+25% dari minggu lalu</p>
        </div>
        <div class="p-6 rounded-xl shadow-lg border-2 bg-amber-50 col-span-2">
            <p class="text-sm font-medium text-gray-500">Tugas Tertunda</p>
            <p class="text-3xl font-bold text-cyan-900 mt-1">14</p>
            <p class="text-xs text-red-500 mt-2">Perlu segera diselesaikan</p>
        </div>
    </div>

    <!-- Konten Panjang untuk memastikan scroll berfungsi -->
    <div class="bg-white p-6 rounded-xl shadow-lg mb-6 border-2">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Laporan Aktivitas Bulanan</h3>
        <p class="text-gray-600 mb-4">
            Ini adalah area konten utama yang mengisi sisa layar (float/fluid) dan dapat digulir. Karena konten di sini
            dibuat cukup panjang, kamu akan melihat *scroll bar* di sisi kanan. Sidebar (di desktop) akan tetap diam di
            tempatnya (fixed).
        </p>

        <!-- Placeholder Konten 1 -->
        <div class="h-64 bg-indigo-50 border border-indigo-200 rounded-lg flex items-center justify-center mb-4">
            <p class="text-indigo-700">Grafik 1: Tren Penjualan</p>
        </div>
        <!-- Placeholder Konten 2 -->
        <div class="h-64 bg-green-50 border border-green-200 rounded-lg flex items-center justify-center mb-4">
            <p class="text-green-700">Tabel Data Pengguna Terbaru</p>
        </div>
        <!-- Placeholder Konten 3 -->
        <div class="h-64 bg-yellow-50 border border-yellow-200 rounded-lg flex items-center justify-center mb-4">
            <p class="text-yellow-700">Peta Distribusi Regional</p>
        </div>
        <!-- Placeholder Konten 4 -->
        <div class="h-64 bg-red-50 border border-red-200 rounded-lg flex items-center justify-center mb-4">
            <p class="text-red-700">Log Error Sistem</p>
        </div>
        <!-- Placeholder Konten 5 -->
        <div class="h-64 bg-gray-200 border border-gray-300 rounded-lg flex items-center justify-center">
            <p class="text-gray-700">Area Konten Tambahan</p>
        </div>

        <p class="text-gray-600 mt-4 text-center text-sm">
            Scroll ke bawah untuk melihat akhir konten.
        </p>
    </div>
    <!-- Akhir Konten Panjang -->
</div>
