<div>
    <div
        class="bg-gray-300 mb-8 border-t-4 border-l-4 border-white border-r-4 border-b-4 border-gray-700 shadow-[8px_8px_0_0_#000000] p-4 sm:p-8">

        <div
            class="bg-blue-700 text-white p-1.5 mb-6 border-t-2 border-l-2 border-blue-400 border-r-2 border-b-2 border-blue-900 shadow-inner">
            <span class="font-bold text-sm">C:\PARTICIPANT\TRANSACTION_CHART.EXE</span>
        </div>

        <h3 class="text-xl font-bold text-gray-900 mb-4">
            Tren Pengeluaran 7 Hari Terakhir
        </h3>

        <div class="bg-gray-200 p-4 border-t-2 border-l-2 border-gray-700 border-r-2 border-b-2 border-white shadow-inner"
            wire:ignore x-data="transactionChart()" x-init="initChart()">
            <canvas x-ref="chart" height="120"></canvas>
        </div>
    </div>

    <script>
        // Nama fungsi Alpine.js diubah
        function transactionChart() {
            return {
                // Data labels dan data (amount) diambil dari Livewire class PHP
                labels: @json($labels ?? []),
                data: @json($data ?? []),
                chart: null,

                initChart() {
                    if (this.chart) {
                        this.chart.destroy();
                    }

                    const chartCanvas = this.$refs.chart;

                    this.chart = new Chart(chartCanvas.getContext('2d'), {
                        type: 'line',
                        data: {
                            labels: this.labels,
                            datasets: [{
                                // Label dataset diubah
                                label: 'Total Pengeluaran Harian (Rp)',
                                data: this.data,
                                // Warna dipertahankan (Hijau Terminal)
                                backgroundColor: 'rgba(0, 255, 0, 0.2)',
                                borderColor: '#00ff00',
                                borderWidth: 2,
                                tension: 0.1,
                                fill: true,
                                pointBackgroundColor: '#00ff00',
                                pointBorderColor: '#00ff00'
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    // Penyesuaian untuk menampilkan mata uang Rupiah pada sumbu Y
                                    ticks: {
                                        color: '#333',
                                        callback: function(value) {
                                            // Format angka menjadi mata uang Rupiah
                                            return new Intl.NumberFormat('id-ID', {
                                                style: 'currency',
                                                currency: 'IDR',
                                                minimumFractionDigits: 0
                                            }).format(value);
                                        }
                                    },
                                    grid: {
                                        color: 'rgba(0, 0, 0, 0.1)'
                                    }
                                },
                                x: {
                                    ticks: {
                                        color: '#333'
                                    },
                                    grid: {
                                        display: false
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                },
                                // Tooltip diubah agar menampilkan format Rupiah
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';

                                            if (label) {
                                                label += ': ';
                                            }
                                            if (context.parsed.y !== null) {
                                                label += new Intl.NumberFormat('id-ID', {
                                                    style: 'currency',
                                                    currency: 'IDR',
                                                    minimumFractionDigits: 0
                                                }).format(context.parsed.y);
                                            }
                                            return label;
                                        }
                                    }
                                }
                            }
                        }
                    });

                    // Opsional: Dengarkan event Livewire untuk update data secara dinamis
                    // Livewire.on('chartDataUpdated', () => { ... kode update ... });
                }
            }
        }
    </script>
</div>
