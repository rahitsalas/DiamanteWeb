@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
           <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Cuentas por Pagar</h2>
                </div>
           </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Obligaciones Pendientes 80/20 * Cuenta 42 * {{$startDate->format('Y-m-d')}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="d-flex mb-0 pb-0">
                                <p class="d-flex flex-column mb-0 pb-0">
                                    <span class="text-bold text-lg">Total {{$dataPagosPendientes42['total']}} Miles de Soles</span>
                                    <span></span>
                                </p>
                            </div>

                            <div class="position-relative">
                                <canvas id="pagospendientes42-chart" height="400"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *Otros esta compuesto por varios proveedores (20%) *Solo Obligaciones Vencidas
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Clasificación de Obligaciones Pendientes</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataPagosClasificacion['total']}} Miles de Soles</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative mb-4">
                                <canvas id="pagosclasificacionvencimiento-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Clasificación de Obligaciones Vencidas</h3>
                                {{--                                                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataPagosClasificacionVencida['total']}} Miles de Soles</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative mb-4">
                                <canvas id="pagosclasificacionvencida-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Clasificación Obligaciones x Vencer</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataPagosClasificacionxVencer['total']}} Miles de Soles</span>
                            </div>

                            <div class="position-relative mb-4">
                                <canvas id="pagosclasificacionxvencer-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Obligaciones Clasificación Flujo 80/20 {{$startDate->format('Y-m-d')}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="d-flex mb-0 pb-0">
                                <p class="d-flex flex-column mb-0 pb-0">
                                    <span class="text-bold text-lg">Total {{$dataPagosClasificacionFlujoVencida['total']}} Miles de Soles</span>
                                    <span></span>
                                </p>
                            </div>

                            <div class="position-relative">
                                <canvas id="pagosclasificacionflujo-chart" height="200"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *Otros esta compuesto por varios proveedores (20%)
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Obligaciones Pendientes 80/20 * Cuenta 43 * {{$startDate->format('Y-m-d')}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="d-flex mb-0 pb-0">
                                <p class="d-flex flex-column mb-0 pb-0">
                                    <span class="text-bold text-lg">Total {{$dataPagosPendientes43['total']}} Miles de Soles</span>
                                    <span></span>
                                </p>
                            </div>

                            <div class="position-relative">
                                <canvas id="pagospendientes43-chart" height="200"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *Otros esta compuesto por varios proveedores (20%) *Solo Obligaciones Vencidas
                            </span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
        window.onload = function () {
            Chart.plugins.unregister(ChartDataLabels);

            var ctx = document.getElementById('pagospendientes42-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'horizontalBar',
                data: {
                    labels: {!! json_encode($dataPagosPendientes42['proveedor']) !!},
                    datasets: [{
                        label: 'Miles de Soles',
                        data:{!! json_encode($dataPagosPendientes42['monto']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgb(255,99,132)',
                        // ],
                        borderWidth: 1,
                        // barThickness: 15,
                        // categoryPercentage: 0.5,
                        // barPercentage: 0.5,

                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            display: true,
                        }],
                        yAxes: [{
                            display: true,
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false   ,
                    // "animation": {
                    //     "duration": 1,
                    //     "onComplete": function() {
                    //         var chartInstance = this.chart,
                    //             ctx = chartInstance.ctx;
                    //         ctx.textAlign = 'center';
                    //         ctx.textBaseline = 'bottom';
                    //         ctx.fillStyle = "#666";//'rgba(255, 159, 64, 1)';//"#666";
                    //         this.data.datasets.forEach(function(dataset, i) {
                    //             var meta = chartInstance.controller.getDatasetMeta(i);
                    //             meta.data.forEach(function(bar, index) {
                    //                 var data = dataset.data[index];
                    //                 ctx.fillText(data, bar._model.x+15, bar._model.y+7.5);
                    //             });
                    //         });
                    //     }
                    // },
                }
            });

            var ctx = document.getElementById('pagosclasificacionvencimiento-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataPagosClasificacion['vencidaflag']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataPagosClasificacion['monto']) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(115, 255, 64, 0.2)',
                            //'rgba(75, 192, 192, 0.2)',
                            // 'rgba(255, 206, 86, 0.2)',

                            'rgba(153, 102, 255, 0.2)',]

                        ,
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgb(42, 177, 66, 1)',
                            //'rgba(75, 192, 192, 1)',
                            // 'rgba(255, 206, 86, 1)',

                            'rgba(153, 102, 255, 1)',],
                        borderWidth: 1
                    }]
                },
                options: {
                    display: 'auto',
                    //cutoutPercentage: 40,
                    responsive: false,
                    tooltips: {
                        enabled: true,
                    },
                    plugins: {
                        datalabels: {
                            formatter: (value, ctx) => {
                                let sum = 0;
                                let dataArr = ctx.chart.data.datasets[0].data;
                                dataArr.map(data => {
                                    sum += data;
                                });
                                let percentage = (value*100 / sum).toFixed(2)+"%";
                                // if((value*100 / sum)>5) {
                                return percentage;
                                // }
                                // else{
                                //     return null;
                                // }

                            },

                            anchor: 'end',
                            // align: 'end',
                            // offset: 10,
                            display: 'auto',
                            //color: '#000000',
                        },

                    }
                }
            });

            var ctx = document.getElementById('pagosclasificacionvencida-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataPagosClasificacionVencida['clasificacion']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataPagosClasificacionVencida['monto']) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(115, 255, 64, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(8,173,173,0.2)',
                            'rgba(142,16,115,0.2)',

                            'rgba(255, 206, 86, 0.2)',

                            ,]

                        ,
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgb(42, 177, 66, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgb(51,198,176)',
                            'rgb(175,39,152)',

                            'rgba(255, 206, 86, 1)',

                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    display: 'auto',
                    //cutoutPercentage: 40,
                    responsive: false,
                    tooltips: {
                        enabled: true,
                    },
                    plugins: {
                        datalabels: {
                            formatter: (value, ctx) => {
                                let sum = 0;
                                let dataArr = ctx.chart.data.datasets[0].data;
                                dataArr.map(data => {
                                    sum += data;
                                });
                                let percentage = (value*100 / sum).toFixed(2)+"%";
                                // if((value*100 / sum)>5) {
                                return percentage;
                                // }
                                // else{
                                //     return null;
                                // }

                            },

                            //anchor: 'end',
                            // align: 'end',
                            // offset: 10,
                            display: 'auto',
                            //color: '#000000',
                        },

                    }
                }
            });

            var ctx = document.getElementById('pagosclasificacionxvencer-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataPagosClasificacionxVencer['clasificacion']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataPagosClasificacionxVencer['monto']) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(115, 255, 64, 0.2)',
                            //'rgba(75, 192, 192, 0.2)',
                            // 'rgba(255, 206, 86, 0.2)',

                            'rgba(153, 102, 255, 0.2)',
                            'rgba(8,173,173,0.2)',
                            'rgba(142,16,115,0.2)',
                        ]

                        ,
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgb(42, 177, 66, 1)',
                            //'rgba(75, 192, 192, 1)',
                            // 'rgba(255, 206, 86, 1)',

                            'rgba(153, 102, 255, 1)',
                            'rgb(51,198,176)',
                            'rgb(175,39,152)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    display: 'auto',
                    //cutoutPercentage: 40,
                    responsive: false,
                    tooltips: {
                        enabled: true,
                    },
                    plugins: {
                        datalabels: {
                            formatter: (value, ctx) => {
                                let sum = 0;
                                let dataArr = ctx.chart.data.datasets[0].data;
                                dataArr.map(data => {
                                    sum += data;
                                });
                                let percentage = (value*100 / sum).toFixed(2)+"%";
                                // if((value*100 / sum)>5) {
                                return percentage;
                                // }
                                // else{
                                //     return null;
                                // }

                            },

                            anchor: 'end',
                            // align: 'end',
                            // offset: 10,
                            display: 'auto',
                            //color: '#000000',
                        },

                    }
                }
            });

            {{--var ctx = document.getElementById('pagospendientes-chart').getContext('2d');--}}
            {{--var myChart = new Chart(ctx, {--}}
            {{--    // plugins: [ChartDataLabels],--}}
            {{--    type: 'horizontalBar',--}}
            {{--    data: {--}}
            {{--        labels: {!! json_encode($dataPagosPendientes['proveedor']) !!},--}}
            {{--        datasets: [{--}}
            {{--            label: 'Miles de Soles',--}}
            {{--            data:{!! json_encode($dataPagosPendientes['monto']) !!},--}}
            {{--            backgroundColor: //[--}}
            {{--                'rgba(255, 99, 132, 0.2)',--}}

            {{--            borderColor: //[--}}
            {{--                'rgb(255,99,132)',--}}
            {{--            // ],--}}
            {{--            borderWidth: 1,--}}
            {{--            // barThickness: 15,--}}
            {{--            // categoryPercentage: 0.5,--}}
            {{--            // barPercentage: 0.5,--}}

            {{--        }]--}}
            {{--    },--}}
            {{--    options: {--}}
            {{--        scales: {--}}
            {{--            xAxes: [{--}}
            {{--                display: true,--}}
            {{--            }],--}}
            {{--            yAxes: [{--}}
            {{--                display: true,--}}
            {{--            }]--}}
            {{--        },--}}
            {{--        responsive: true,--}}
            {{--        maintainAspectRatio: true   ,--}}
            {{--        "animation": {--}}
            {{--            "duration": 1,--}}
            {{--            "onComplete": function() {--}}
            {{--                var chartInstance = this.chart,--}}
            {{--                    ctx = chartInstance.ctx;--}}
            {{--                ctx.textAlign = 'center';--}}
            {{--                ctx.textBaseline = 'bottom';--}}
            {{--                ctx.fillStyle = "#666";//'rgba(255, 159, 64, 1)';//"#666";--}}
            {{--                this.data.datasets.forEach(function(dataset, i) {--}}
            {{--                    var meta = chartInstance.controller.getDatasetMeta(i);--}}
            {{--                    meta.data.forEach(function(bar, index) {--}}
            {{--                        var data = dataset.data[index];--}}
            {{--                        ctx.fillText(data, bar._model.x+15, bar._model.y+7.5);--}}
            {{--                    });--}}
            {{--                });--}}
            {{--            }--}}
            {{--        },--}}
            {{--    }--}}
            {{--});--}}

            var ctx = document.getElementById('pagosclasificacionflujo-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'horizontalBar',
                data: {
                    labels: {!! json_encode($dataPagosClasificacionFlujoVencida['flujo']) !!},

                    datasets: [

                        {
                            label: {!! json_encode($dataPagosClasificacionFlujoVencida['vencidaflag']) !!},
                            data:{!! json_encode($dataPagosClasificacionFlujoVencida['monto']) !!},
                            backgroundColor: //[
                                'rgba(54, 162, 235, 0.2)',

                            borderColor: //[
                                'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            stack: 'OrdenCompra'
                        },

                        {
                            label: {!! json_encode($dataPagosClasificacionFlujoxVencer['vencidaflag']) !!},
                            data:{!! json_encode($dataPagosClasificacionFlujoxVencer['monto']) !!},

                                backgroundColor: //[
                                        'rgba(255, 99, 132, 0.2)',

                                    borderColor: //[
                                        'rgba(255, 99, 132, 1)',
                                    borderWidth: 1,
                            stack: 'OrdenCompra'
                        },

                        {{--{--}}
                        {{--    label: {!! json_encode($dataOrdenCompraServicioMixPasadoOS['clasificacion']) !!},--}}
                        {{--    data:{!! json_encode($dataOrdenCompraServicioMixPasadoOS['porcentaje']) !!},--}}
                        {{--    backgroundColor: //[--}}
                        {{--        'rgba(255, 99, 132, 0.2)',--}}

                        {{--    borderColor: //[--}}
                        {{--        'rgba(255, 99, 132, 1)',--}}
                        {{--    borderWidth: 1,--}}
                        {{--    stack: 'OrdenCompra'--}}
                        {{--},--}}

                        {{--{--}}
                        {{--    label: {!! json_encode($dataOrdenCompraServicioMixActualOS['clasificacion']) !!},--}}
                        {{--    label: 'OC',--}}
                        {{--    data:{!! json_encode($dataOrdenCompraServicioMixActualOS['porcentaje']) !!},--}}
                        {{--    backgroundColor: //[--}}
                        {{--        'rgba(255, 99, 132, 0.2)',--}}

                        {{--    borderColor: //[--}}
                        {{--        'rgba(255, 99, 132, 1)',--}}
                        {{--    borderWidth: 1,--}}
                        {{--    stack: 'OrdenServicio',--}}
                        {{--    // hiddenLegend: true,--}}
                        {{--},--}}


                    ]
                },
                options: {
                    tooltips: {
                        enabled: false
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            // stacked: true
                        }],
                        yAxes: [{
                            display: true,
                            // stacked: true
                            // ticks: {
                            //     // Include a dollar sign in the ticks
                            //     callback: function(value, index, values) {
                            //         return  value+'%';
                            //     }
                            // }
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    // legend: {
                    //     labels: {
                    //         filter: function (legendItem, chartData) {
                    //             if (legendItem.datasetIndex === 1 || legendItem.datasetIndex === 3) {
                    //                 return false;
                    //             }
                    //             return true;
                    //         }
                    //     },
                    //     onClick: (e) => e.stopPropagation()
                    // },


                    // legend: {
                    //     labels: {
                    //         filter: function(item, chart) {
                    //             // Logic to remove a particular legend item goes here
                    //             return !item.text.includes('OC');
                    //         }
                    //     }
                    // }
                }
            });


            var ctx = document.getElementById('pagospendientes43-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                // plugins: [ChartDataLabels],
                type: 'horizontalBar',
                data: {
                    labels: {!! json_encode($dataPagosPendientes43['proveedor']) !!},
                    datasets: [{
                        label: 'Miles de Soles',
                        data:{!! json_encode($dataPagosPendientes43['monto']) !!},
                        backgroundColor: //[
                            'rgba(54, 162, 235, 0.2)',

                        borderColor: //[
                            'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        // barThickness: 15,
                        // categoryPercentage: 0.5,
                        // barPercentage: 0.5,

                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            display: true,
                        }],
                        yAxes: [{
                            display: true,
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false   ,
                    "animation": {
                        "duration": 1,
                        "onComplete": function() {
                            var chartInstance = this.chart,
                                ctx = chartInstance.ctx;
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';
                            ctx.fillStyle = "#666";//'rgba(255, 159, 64, 1)';//"#666";
                            this.data.datasets.forEach(function(dataset, i) {
                                var meta = chartInstance.controller.getDatasetMeta(i);
                                meta.data.forEach(function(bar, index) {
                                    var data = dataset.data[index];
                                    ctx.fillText(data, bar._model.x+15, bar._model.y+7);
                                });
                            });
                        }
                    },
                }
            });

            {{--var ctx = document.getElementById('despachodiariosoles-chart').getContext('2d');--}}
            {{--var myChart = new Chart(ctx, {--}}
            {{--    type: 'line',--}}
            {{--    data: {--}}
            {{--        labels: {!! json_encode($dataDespachoDiaroSoles['fecha']) !!},--}}
            {{--        datasets: [{--}}
            {{--            label: 'Soles',--}}
            {{--            data:{!! json_encode($dataDespachoDiaroSoles['cantidad']) !!},--}}
            {{--            backgroundColor: //[--}}
            {{--                'rgba(115,255,64,0.2)',--}}

            {{--            borderColor: //[--}}
            {{--                'rgb(42, 177, 66, 1)',--}}
            {{--            borderWidth: 1--}}
            {{--        }]--}}
            {{--    },--}}
            {{--    options: {--}}
            {{--        scales: {--}}
            {{--            xAxes: [{--}}
            {{--                display: true--}}
            {{--            }],--}}
            {{--            yAxes: [{--}}
            {{--                display: true,--}}
            {{--            }]--}}
            {{--        },--}}
            {{--        responsive: true,--}}
            {{--        maintainAspectRatio: false,--}}
            {{--        // plugins: {--}}
            {{--        //     datalabels: {--}}
            {{--        //--}}
            {{--        //     }--}}
            {{--        //--}}
            {{--        // }--}}
            {{--    }--}}
            {{--});--}}
        }
    </script>



@endsection
