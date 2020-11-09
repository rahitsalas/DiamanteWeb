@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Almacén</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Stock por Calidad</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataStockTotalCalidad['total']}} Millares</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative mb-4">
                                <canvas id="stocktotalcalidad-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Stock por Familia (Primera)</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataStockTotalTipoItem['total']}} Millares</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative mb-4">
                                <canvas id="stocktotaltipoitem-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Stock por Almacén (Primera)</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataStockTotalAlmacen['total']}} Millares </span>
                            </div>

                            <div class="position-relative mb-4">
                                <canvas id="stocktotalalmacen-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Stock Familia Estructural (Primera)</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataStockFamiliaEstructural['total']}} Millares</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative mb-4">
                                <canvas id="stockfamiliaestructural-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Stock Familia Tabiqueria (Primera)</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataStockFamiliaTabiqueria['total']}} Millares</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative mb-4">
                                <canvas id="stockfamiliatabiqueria-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Stock Familia Para Techo (Primera)</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataStockFamiliaParaTecho['total']}} Millares </span>
                            </div>

                            <div class="position-relative mb-4">
                                <canvas id="stockfamiliaparatecho-chart" height="200"></canvas>
                            </div>
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

            var ctx = document.getElementById('stocktotalcalidad-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataStockTotalCalidad['calidad']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataStockTotalCalidad['cantidad']) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(115, 255, 64, 0.2)',
                            //'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 206, 86, 0.2)',

                            'rgba(153, 102, 255, 0.2)',]

                        ,
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgb(42, 177, 66, 1)',
                            //'rgba(75, 192, 192, 1)',
                            'rgba(255, 206, 86, 1)',

                            'rgba(153, 102, 255, 1)',],
                        borderWidth: 1
                    }]
                },
                options: {
                    //cutoutPercentage: 40,
                    responsive: false,
                    tooltips: {
                        enabled: true
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
                                return percentage;
                            },
                            //color: '#000000',
                        }
                    }
                }
            });

            var ctx = document.getElementById('stocktotaltipoitem-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataStockTotalTipoItem['familia']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataStockTotalTipoItem['cantidad']) !!},
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

                            //anchor: 'end',
                            // align: 'end',
                            // offset: 10,
                            display: 'auto',
                            //color: '#000000',
                        },

                    }
                }
            });

            var ctx = document.getElementById('stocktotalalmacen-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataStockTotalAlmacen['almacen']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataStockTotalAlmacen['cantidad']) !!},
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

                            //anchor: 'end',
                            // align: 'end',
                            // offset: 10,
                            display: 'auto',
                            //color: '#000000',
                        },

                    }
                }
            });

            var ctx = document.getElementById('stockfamiliaestructural-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataStockFamiliaEstructural['item']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataStockFamiliaEstructural['cantidad']) !!},
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

            var ctx = document.getElementById('stockfamiliatabiqueria-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataStockFamiliaTabiqueria['item']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataStockFamiliaTabiqueria['cantidad']) !!},
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

                            //anchor: 'end',
                            // align: 'end',
                            // offset: 10,
                            display: 'auto',
                            //color: '#000000',
                        },

                    }
                }
            });

            var ctx = document.getElementById('stockfamiliaparatecho-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataStockFamiliaParaTecho['item']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataStockFamiliaParaTecho['cantidad']) !!},
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





        }
    </script>



@endsection
