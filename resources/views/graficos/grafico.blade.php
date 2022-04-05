<x-app-layout>

    <x-slot name="header">
        <style>
            .chartbox {
                width: 100%;
                height: 800px;
            }
        </style>

    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <H1><b>Alquileres hechos entre Enero y Junio de 2005</b></H1>
                    <div class="chartbox">
                        <canvas id="chart-rental"></canvas>
                    </div>
                    <H2 style="text-align: center" >Meses</H2>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>
    const cData = JSON.parse(`<?php echo $data; ?>`)
    console.log(cData);
    const ctx = document.getElementById('chart-rental').getContext('2d');

    const myChart = new Chart(ctx, {
        type:'bar',
        data: {
            labels:cData.label,
            datasets:[{
                label:'Alquileres',
                data:cData.data,
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
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
     