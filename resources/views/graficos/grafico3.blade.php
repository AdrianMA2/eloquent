<x-app-layout>

    <x-slot name="header">

    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <H1><b>Filtrar por fecha</b></H1>
                    <input type="date" id="start" name="trip-start"
                        value="2018-07-22" min="2018-01-01" max="2018-12-31">
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <H1><b>Ventas por meses</b></H1>
                    <canvas id="chart-1" width="100" height="100" ></canvas>
                    <H2 style="text-align: center">Meses</H2>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>
    const cData1 = JSON.parse(`<?php echo $data; ?>`)
    console.log(cData1);
    const ctx1 = document.getElementById('chart-1').getContext('2d');

    const myChart1 = new Chart(ctx1, {
        type:'line',
        data: {
            labels:cData1.label1,
            datasets:[{
                label:'Ventas',
                data:cData1.data1,
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
                borderWidth: 5
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

