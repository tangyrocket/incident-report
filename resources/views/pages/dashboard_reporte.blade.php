<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard de Reportes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Incidentes por Empresa</h3>
                    <div class="h-64">
                        <canvas id="chartByCompany"></canvas>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Incidentes por Mes</h3>
                    <div class="h-64">
                        <canvas id="chartByMonth"></canvas>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Incidentes por Área</h3>
                    <div class="h-64">
                        <canvas id="chartByType"></canvas>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Estado de Incidentes</h3>
                    <div class="h-64">
                        <canvas id="chartByStatus"></canvas>
                    </div>
                </div>
            </div>


            @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const chartData = @json($chartData)

                    function createChart(canvasId, chartType, labels, data, label) {
                        const ctx = document.getElementById(canvasId).getContext('2d');
                        new Chart(ctx, {
                            type: chartType,
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: label,
                                    data: data,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }

                    createChart('chartByCompany', 'bar', chartData.byCompany.labels, chartData.byCompany.data, 'Incidentes por Empresa');
                    createChart('chartByMonth', 'line', chartData.byMonth.labels, chartData.byMonth.data, 'Incidentes por Mes');
                    createChart('chartByType', 'pie', chartData.byType.labels, chartData.byType.data, 'Incidentes por Área');
                    createChart('chartByStatus', 'doughnut', chartData.byStatus.labels, chartData.byStatus.data, 'Estado de Incidentes');
                });
            </script>
            @endpush

        </div>
    </div>
</x-app-layout>
