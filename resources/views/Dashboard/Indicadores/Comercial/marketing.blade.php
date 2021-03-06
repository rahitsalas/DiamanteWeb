@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
           <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Compras</h2>
                </div>
            </div>

            <div class="row">
{{--                @if(Auth::user()->id==1)--}}
{{--                    <div class="col-md-9">--}}
{{--                        @else--}}
                <div class="col-md-12">
{{--                                @endif--}}
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Órdenes de Compra y Servicio (S/. MM)</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
{{--                                        <div class="d-flex">--}}
{{--                                            <p class="d-flex flex-column">--}}
{{--                                                <span class="text-bold text-lg">Total {{$dataDespachoDiaroMillar['total']}} Millares</span>--}}
{{--                                                <span></span>--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="ordencompraserviciosoles-chart" height="200"></canvas>
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
                                <h3 class="card-title">Órdenes de Compra y Servicio (S/. MM) - Gastos</h3>
{{--                                                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
{{--                                                <span class="text-bold text-lg">Total {{$dataDespachoDiaroSoles['total']}} Miles de Soles</span>--}}
                                    <span></span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="ordencompraserviciogastos-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                {{--                @if(Auth::user()->id==1)--}}
                {{--                    <div class="col-md-9">--}}
                {{--                        @else--}}
                <div class="col-md-12">
                    {{--                                @endif--}}
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Órdenes de Compra y Servicio (S/. MM) - Activos</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    {{--                                                <span class="text-bold text-lg">Total {{$dataDespachoDiaroSoles['total']}} Miles de Soles</span>--}}
                                    <span></span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="ordencompraservicioactivos-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                {{--                @if(Auth::user()->id==1)--}}
                {{--                    <div class="col-md-9">--}}
                {{--                        @else--}}
                <div class="col-md-12">
                    {{--                                @endif--}}
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Cantidad de Órdenes de Compra y Servicio</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    {{--                                                <span class="text-bold text-lg">Total {{$dataDespachoDiaroSoles['total']}} Miles de Soles</span>--}}
                                    <span></span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="ordencompraserviciocantidad-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                {{--                @if(Auth::user()->id==1)--}}
                {{--                    <div class="col-md-9">--}}
                {{--                        @else--}}
                <div class="col-md-12">
                    {{--                                @endif--}}
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Comparativo Mix O. Compra vs O. Servicio (%)</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    {{--                                                <span class="text-bold text-lg">Total {{$dataDespachoDiaroSoles['total']}} Miles de Soles</span>--}}
                                    <span></span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="ordencompraserviciomix-chart" height="200"></canvas>
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


            var ctx = document.getElementById('ordencompraserviciosoles-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataOrdenCompraServicioSolesPasado['mes']) !!},
                    datasets: [{
                        label: {!! json_encode($dataOrdenCompraServicioSolesPasado['año']) !!},
                        data:{!! json_encode($dataOrdenCompraServicioSolesPasado['montototal']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: {!! json_encode($dataOrdenCompraServicioSolesActual['año']) !!},
                        data:{!! json_encode($dataOrdenCompraServicioSolesActual['montototal']) !!},
                        backgroundColor: //[
                            'rgba(115,255,64,0.2)',

                        borderColor: //[
                            'rgb(42, 177, 66, 1)',
                        borderWidth: 1
                    }
                    ]
                },
                options: {
                    scales: {
                        xAxes: [{
                            display: true
                        }],
                        yAxes: [{
                            display: true,
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            var ctx = document.getElementById('ordencompraserviciogastos-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataOrdenCompraServicioGastosPasado['mes']) !!},
                    datasets: [{
                        label: {!! json_encode($dataOrdenCompraServicioGastosPasado['año']) !!},
                        data:{!! json_encode($dataOrdenCompraServicioGastosPasado['montototal']) !!},
                        backgroundColor: //[
                            'rgba(54, 162, 235, 0.2)',

                        borderColor: //[
                            'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                        {
                            label: {!! json_encode($dataOrdenCompraServicioGastosActual['año']) !!},
                            data:{!! json_encode($dataOrdenCompraServicioGastosActual['montototal']) !!},
                            backgroundColor: //[
                                'rgba(255, 159, 64, 0.2)',

                            borderColor: //[
                                'rgba(255, 159, 64, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        xAxes: [{
                            display: true,
                            // stacked: true
                        }],
                        yAxes: [{
                            display: true,
                            // stacked: true
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            var ctx = document.getElementById('ordencompraservicioactivos-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataOrdenCompraServicioActivosPasado['mes']) !!},
                    datasets: [{
                        label: {!! json_encode($dataOrdenCompraServicioActivosPasado['año']) !!},
                        data:{!! json_encode($dataOrdenCompraServicioActivosPasado['montototal']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                        {
                        label: {!! json_encode($dataOrdenCompraServicioActivosActual['año']) !!},
                        data:{!! json_encode($dataOrdenCompraServicioActivosActual['montototal']) !!},
                        backgroundColor: //[
                            'rgba(115,255,64,0.2)',

                        borderColor: //[
                            'rgb(42, 177, 66, 1)',
                        borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        xAxes: [{
                            display: true
                        }],
                        yAxes: [{
                            display: true,
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            var ctx = document.getElementById('ordencompraserviciocantidad-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataOrdenCompraServicioCantidadPasado['mes']) !!},
                    datasets: [{
                        label: {!! json_encode($dataOrdenCompraServicioCantidadPasado['año']) !!},
                        data:{!! json_encode($dataOrdenCompraServicioCantidadPasado['cantidad']) !!},
                        backgroundColor: //[
                            'rgba(54, 162, 235, 0.2)',

                        borderColor: //[
                            'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                        {
                            label: {!! json_encode($dataOrdenCompraServicioCantidadActual['año']) !!},
                            data:{!! json_encode($dataOrdenCompraServicioCantidadActual['cantidad']) !!},
                            backgroundColor: //[
                                'rgba(255, 159, 64, 0.2)',

                            borderColor: //[
                                'rgba(255, 159, 64, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        xAxes: [{
                            display: true,
                            // stacked: true
                        }],
                        yAxes: [{
                            display: true,
                            // stacked: true
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            var ctx = document.getElementById('ordencompraserviciomix-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataOrdenCompraServicioMixActualOS['mes']) !!},
                    // labels: [[["2019", "2020"], "Active: 2 hrs"],
                    //     [["2019", "2020"], "Active: 2 hrs"],
                    //     [["2019", "2020"], "Active: 2 hrs"],
                    //     [["2019", "2020"], "Active: 2 hrs"]],
            //
            //         [["2019", "2020"], "Enero"],
            // [["2019", "2020"], "Febrero"],
            //     [["2019", "2020"], "Marzo"],
            //     [["2019", "2020"], "Abril"],
                // [["2019", "2020"], "Mayo"],
                // [["2019", "2020"], "Junio"],
                // [["2019", "2020"], "Julio"],
                // [["2019", "2020"], "Agosto"],
                // [["2019", "2020"], "Septiembre"],
                // [["2019", "2020"], "Octubre"],
                // [["2019", "2020"], "Noviembre"],
                // [["2019", "2020"], "Diciembre"],

                datasets: [

                        {
                            label: {!! json_encode($dataOrdenCompraServicioMixPasadoOC['clasificacion']) !!},
                            data:{!! json_encode($dataOrdenCompraServicioMixPasadoOC['porcentaje']) !!},
                            backgroundColor: //[
                                'rgba(54, 162, 235, 0.2)',

                            borderColor: //[
                                'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            stack: 'OrdenCompra'
                        },

                        {
                            label: {!! json_encode($dataOrdenCompraServicioMixActualOC['clasificacion']) !!},
                            data:{!! json_encode($dataOrdenCompraServicioMixActualOC['porcentaje']) !!},

                            backgroundColor: //[
                                'rgba(54, 162, 235, 0.2)',

                            borderColor: //[
                                'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            stack: 'OrdenServicio'
                        },

                        {
                            label: {!! json_encode($dataOrdenCompraServicioMixPasadoOS['clasificacion']) !!},
                            data:{!! json_encode($dataOrdenCompraServicioMixPasadoOS['porcentaje']) !!},
                            backgroundColor: //[
                                'rgba(255, 99, 132, 0.2)',

                            borderColor: //[
                                'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            stack: 'OrdenCompra'
                        },

                        {
                            label: {!! json_encode($dataOrdenCompraServicioMixActualOS['clasificacion']) !!},
                            label: 'OC',
                            data:{!! json_encode($dataOrdenCompraServicioMixActualOS['porcentaje']) !!},
                            backgroundColor: //[
                                'rgba(255, 99, 132, 0.2)',

                            borderColor: //[
                                'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            stack: 'OrdenServicio',
                            // hiddenLegend: true,
                        },


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
                            ticks: {
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return  value+'%';
                                }
                            }
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        labels: {
                            filter: function (legendItem, chartData) {
                                if (legendItem.datasetIndex === 1 || legendItem.datasetIndex === 3) {
                                    return false;
                                }
                                return true;
                            }
                        },
                        onClick: (e) => e.stopPropagation()
                    },


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
        }
    </script>



@endsection
