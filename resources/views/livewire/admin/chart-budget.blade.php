<div class="p-6 bg-white shadow-xl rounded-lg sm:p-8 border-2">
    <!-- Judul Komponen -->
    <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Ringkasan Data</h1>

    <!-- Tampilkan data dalam Chart -->
    <div class="flex justify-between">
        <div class="w-auto">
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <canvas id="budgetChartpie" class="w-auto h-96"></canvas>
            </div>
        </div>
        <!-- Tampilkan data mentah dalam bentuk tabel -->
        <div class="overflow-x-auto">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Data Mentah (Anggaran per Nama Kegiatan)</h2>
            <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama
                            Kegiatan</th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total Jumlah</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach (array_combine($chartLabels, $chartData) as $label => $data)
                        <tr class="hover:bg-indigo-50/50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $label }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-700">
                                Rp{{ number_format($data, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (empty($chartLabels))
                <p class="text-center text-gray-500 py-8 border-t border-gray-300 mt-4">Tidak ada data transaksi
                    yang
                    ditemukan.</p>
            @endif
        </div>
    </div>

    <div class="mt-4 bg-gray-50 rounded-lg border border-gray-200">
        <canvas id="budgetchartbar"></canvas>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            try {
                // --- 1. SETUP DATA ---
                // Catatan: Asumsi properti Livewire di PHP sudah diganti namanya (budgetLabels/transactionLabels)
                // Jika di PHP masih menggunakan $chartLabels, $chartData, $labels, $count, maka data di bawah ini sudah benar.
                const pieLabels = JSON.parse('{!! json_encode($chartLabels) !!}');
                const pieData = JSON.parse('{!! json_encode($chartData) !!}');
                const barLabels = JSON.parse('{!! json_encode($labels) !!}');
                const barData = JSON.parse('{!! json_encode($count) !!}'); // Data hitungan/count untuk Bar Chart

                // Buat fungsi untuk menghasilkan warna acak yang cerah
                function generateRandomColor() {
                    const r = Math.floor(Math.random() * 200) + 50;
                    const g = Math.floor(Math.random() * 200) + 50;
                    const b = Math.floor(Math.random() * 200) + 50;
                    return `rgb(${r}, ${g}, ${b})`;
                }

                const pieBackgroundColors = pieData.map(() => generateRandomColor());
                // Warna tunggal untuk Bar Chart (agar tidak terlalu ramai)
                const barBackgroundColor = 'rgba(75, 192, 192, 0.8)';


                // -------------------------------------------------------------------
                // --- 2. INISIALISASI CHART PERTAMA (PIE CHART) ---
                // -------------------------------------------------------------------
                const pieCanvas = document.getElementById('budgetChartpie'); // Asumsi ID ini ada di HTML

                if (pieData.length > 0) {
                    const ctxPie = pieCanvas.getContext('2d');

                    // Objek Config Pie (BUG FIXED!)
                    const configPie = {
                        type: 'pie',
                        data: {
                            // BUG FIX 1: 'label' tidak boleh di properti data, harusnya 'labels'
                            labels: pieLabels,
                            datasets: [{
                                label: 'Total Anggaran (Rp)',
                                data: pieData,
                                // BUG FIX 2: backgroundColors harusnya tanpa 's' di datasets
                                backgroundColor: pieBackgroundColors,
                                hoverOffset: 4,
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                                title: {
                                    display: true,
                                    text: 'Distribusi Anggaran Berdasarkan Nama Kegiatan'
                                }
                            }
                        }
                    };
                    new Chart(ctxPie, configPie); // Inisialisasi Chart 1
                } else {
                    // Penanganan Data Kosong Pie Chart
                    pieCanvas.outerHTML = '<p class="text-center text-red-500 py-12">Data Anggaran Kosong.</p>';
                }

                // -------------------------------------------------------------------
                // --- 3. INISIALISASI CHART KEDUA (BAR CHART) ---
                // -------------------------------------------------------------------
                // BUG FIX 3: Ganti ID di sini sesuai ID Canvas kedua yang kamu siapkan (misal 'chartBarTransaction')
                const barCanvas = document.getElementById(
                'budgetchartbar'); // Asumsi kamu menggunakan ID 'budgetchartline'

                if (barData.length > 0) {
                    const ctxBar = barCanvas.getContext('2d');

                    // Objek Config Bar
                    const configBar = {
                        type: 'bar',
                        data: {
                            labels: barLabels, // Data dari $labels (Tipe Transaksi)
                            datasets: [{
                                label: 'Jumlah Transaksi',
                                data: barData, // Data dari $count (Hitungan Transaksi)
                                backgroundColor: barBackgroundColor,
                                borderColor: barBackgroundColor.replace('0.8', '1'),
                                borderWidth: 1,
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true
                                },
                                title: {
                                    display: true,
                                    text: 'Frekuensi Transaksi Berdasarkan Tipe'
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Transaksi'
                                    }
                                }
                            }
                        }
                    };
                    new Chart(ctxBar, configBar); // Inisialisasi Chart 2
                } else {
                    // Penanganan Data Kosong Bar Chart
                    barCanvas.outerHTML = '<p class="text-center text-red-500 py-12">Data Transaksi Kosong.</p>';
                }


            } catch (e) {
                // BUG FIX 4: Pastikan ID 'budgetChart' di sini adalah ID kontainer default yang kamu tangani
                console.error("Gagal mem-parse data chart dari PHP:", e);
                const errorContainer = document.getElementById('budgetChart');
                if (errorContainer) {
                    errorContainer.outerHTML =
                        '<p class="text-center text-lg text-red-500 py-12">Error memuat data chart: Parsing Gagal.</p>';
                }
            }
        });
    </script>

</div>
