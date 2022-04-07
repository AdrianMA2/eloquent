<x-app-layout>

    <x-slot name="header">
        <style>
            .chartbox {width: 75%;height: 750px;}
            .center {margin: auto}
        </style>

    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 chartbox center">
                    <H1><b>Ventas por tienda</b></H1>
                    <canvas id="chart-1"></canvas>
                    <H2 style="text-align: center">Tiendas</H2>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 chartbox center">
                    <H1><b>Top 5 clientes</b></H1>
                    <canvas id="chart-2"></canvas>
                    <H2 style="text-align: center">Nombres</H2>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 chartbox center">
                    <H1><b>Top 20 zonas que mas venden</b></H1>
                    <canvas id="chart-3"></canvas>
                    <H2 style="text-align: center">Zonas</H2>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 chartbox center">
                    <H1><b>Top 10 paises con mas clientes</b></H1>
                    <canvas id="chart-4"></canvas>
                    <H2 style="text-align: center">Paises</H2>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>
<script>
    const cData1 = JSON.parse(`<?php echo $data; ?>`)
    console.log(cData1);
    const ctx1 = document.getElementById('chart-1').getContext('2d');

    const myChart1 = new Chart(ctx1, {
        type:'bar',
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
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });
    const cData2 = JSON.parse(`<?php echo $data; ?>`)
    console.log(cData2);
    const ctx2 = document.getElementById('chart-2').getContext('2d');

    const myChart2 = new Chart(ctx2, {
        type:'bar',
        data: {
            labels:cData2.label2,
            datasets:[{
                label:'Dólares',
                data:cData2.data2,
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
                    beginAtZero: false
                }
            }
        }
    });
    const cData3 = JSON.parse(`<?php echo $data; ?>`)
    console.log(cData3);
    const ctx3 = document.getElementById('chart-3').getContext('2d');

    const myChart3 = new Chart(ctx3, {
        type:'polarArea',
        data: {
            labels:cData3.label3,
            datasets:[{
                label:'Veces',
                data:cData3.data3,
                backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                labels: {
                    render: (args) => {
                        if(args.percentage > 0){
                        return `${args.label}:
${args.value} clientes`
                        }
                    }
                }
            }
        },
    });
    const cData4 = JSON.parse(`<?php echo $data; ?>`)
    console.log(cData4);
    const ctx4 = document.getElementById('chart-4').getContext('2d');

    const myChart4 = new Chart(ctx4, {
        type:'pie',
        data: {
            labels:cData4.label4,
            datasets:[{
                label:'Paises',
                data:cData4.data4,
                backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            maintainAspectRatio: false,
            
            plugins: {
                labels: {
                    render: (args) => {
                        if(args.percentage > 0){
                        return `${args.label}:
${args.value} clientes`
                        }
                    }
                }
            }
        },
    });
</script>
