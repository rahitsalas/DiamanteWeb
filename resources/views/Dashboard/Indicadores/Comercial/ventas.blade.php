@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Ventas</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Mix Vta x Tipo Pago {{$startDate->format('Y-m')}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataDespachoTotalTipoPago['total']}} Miles de Soles</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative mb-4">
                                <canvas id="despachototaltipopago-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Mix Vta x Tipo Item {{$startDate->format('Y-m')}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataDespachoTotalTipoItem['total']}} Millares</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative mb-4">
                                <canvas id="despachototaltipoitem-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Mix Vta x Tipo Cliente {{$startDate->format('Y-m')}}</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataDespachoTotalTipoCliente['total']}} Millares </span>
                            </div>

                            <div class="position-relative mb-4">
                                <canvas id="despachototaltipocliente-chart" height="200"></canvas>
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
                                <h3 class="card-title">Venta por Agencia / Sucursal {{$startDate->format('Y-m')}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataDespachoTotalUnidadNegocio['total']}} Millares</span>
                                    <span></span>
                                </p>
                            </div>

                            <div class="position-relative">
                                <canvas id="despachototalunidadnegocio-chart" height="200"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *Solo se muestran Agencias o Sucursales con Ventas
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Descuentos</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Montos de Descuentos {{$startDate->format('Y')-1}} & {{$startDate->format('Y')}} S/ K</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 pb-0 mb-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataDescuentoMensual01['total']}} Miles de Soles</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative pt-0 mt-0 pb-2 mb-0">
                                <canvas id="descuentomontomensual-chart" height="400"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *No incluye IGV
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
                                <h3 class="card-title">Cantidad de Descuentos {{$startDate->format('Y')-1}}  & {{$startDate->format('Y')}}</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 pb-0 mb-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataDescuentoMensual01['totalcantidad']}} descuentos</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative pt-0 mt-0 pb-2 mb-0">
                                <canvas id="descuentocantidadmensual-chart" height="400"></canvas>
                            </div>
                        </div>
                {{--                        <div class="card-footer pt-0 mt-0 bg-white">--}}
                {{--                            <span class="users-list-date mb-0">--}}
                {{--                                *No incluye IGV--}}
                {{--                            </span>--}}
                {{--                        </div>--}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Descuentos {{$startDate->format('Y')}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataDescuentoTopAñoActual['total']}} Miles de Soles</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative border-0 pb-0 mb-0">
                                <canvas id="descuentostopañoactual-chart" height="400" ></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *Descuentos acumulados Año {{($startDate->format('Y'))}} S/K
                            </span>
                        </div>
                    </div>
                </div>
{{--            </div>--}}
{{--            <div class="row">--}}
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Descuentos {{($startDate->format('Y')-1)}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataDescuentoTopAñoPasado['total']}} Miles de Soles</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative border-0 pb-0 mb-0">
                                <canvas id="descuentostopañopasado-chart" height="400"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *Descuentos acumulados Año {{($startDate->format('Y')-1)}} S/K
                            </span>
                        </div>
                    </div>
                </div>
{{--                <div class="col-md-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header border-0">--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <h3 class="card-title">Stock por Almacén (Primera)</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body pt-0 mt-0">--}}
{{--                            <div class="d-flex">--}}
{{--                                <p class="d-flex flex-column">--}}
{{--                                    <span class="text-bold text-lg">Total {{$dataStockTotalAlmacen['total']}} Millares </span>--}}
{{--                            </div>--}}

{{--                            <div class="position-relative mb-4">--}}
{{--                                <canvas id="stocktotalalmacen-chart" height="200"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Descuentos Acumulados {{$startDate->format('Y')-1}} y {{$startDate->format('Y')}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataDescuentoTopAcumulado['total']}} Miles de Soles</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative border-0 pb-0 mb-0">
                                <canvas id="descuentostopacumulado-chart" height="400" ></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *Solo Distribuidores - S/K
                            </span>
                        </div>
                    </div>
                </div>
                {{--            </div>--}}
                {{--            <div class="row">--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="card ">--}}
{{--                        <div class="card-header border-0">--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <h3 class="card-title">Descuentos {{($startDate->format('Y')-1)}}</h3>--}}
{{--                                --}}{{--                                <a href="javascript:void(0);">View Report</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body pt-0 mt-0">--}}
{{--                            <div class="d-flex">--}}
{{--                                <p class="d-flex flex-column">--}}
{{--                                    <span class="text-bold text-lg">Total {{$dataDescuentoTopAñoPasado['total']}} Miles de Soles</span>--}}
{{--                                    <span></span>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="position-relative border-0 pb-0 mb-0">--}}
{{--                                <canvas id="descuentostopañopasado-chart" height="400"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer pt-0 mt-0 bg-white">--}}
{{--                            <span class="users-list-date mb-0">--}}
{{--                                *Descuentos acumulados Año {{($startDate->format('Y')-1)}} S/K--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                {{--                <div class="col-md-4">--}}
                {{--                    <div class="card">--}}
                {{--                        <div class="card-header border-0">--}}
                {{--                            <div class="d-flex justify-content-between">--}}
                {{--                                <h3 class="card-title">Stock por Almacén (Primera)</h3>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="card-body pt-0 mt-0">--}}
                {{--                            <div class="d-flex">--}}
                {{--                                <p class="d-flex flex-column">--}}
                {{--                                    <span class="text-bold text-lg">Total {{$dataStockTotalAlmacen['total']}} Millares </span>--}}
                {{--                            </div>--}}

                {{--                            <div class="position-relative mb-4">--}}
                {{--                                <canvas id="stocktotalalmacen-chart" height="200"></canvas>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
        window.onload = function () {
            Chart.plugins.unregister(ChartDataLabels);


            var ctx = document.getElementById('descuentomontomensual-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataDescuentoMensual01['mesdescripcion']) !!},

                    datasets: [
                        {
                            label: {!! json_encode($dataDescuentoMensual12['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual12['montodesc']) !!},
                            backgroundColor: //[
                                'rgba(115, 255, 64, 0.2)',

                            borderColor: //[
                                'rgb(42, 177, 66, 1)',

                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual01['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual01['montodesc']) !!},
                            backgroundColor: //[
                                'rgba(54, 162, 235, 0.2)',

                            borderColor: //[
                                'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                             stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual02['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual02['montodesc']) !!},

                            backgroundColor: //[
                                'rgba(255, 99, 132, 0.2)',

                            borderColor: //[
                                'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual13['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual13 ['montodesc']) !!},
                            backgroundColor: //[
                                'rgba(255, 159, 64, 0.2)',

                            borderColor: //[
                                'rgba(255, 159, 64, 1)',

                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual05['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual05['montodesc']) !!},
                            backgroundColor: //[
                                'rgba(153, 102, 255, 0.2)',

                            borderColor: //[
                                'rgba(153, 102, 255, 1)',

                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual06['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual06['montodesc']) !!},

                            backgroundColor: //[
                                'rgb(140,96,49,0.2)',

                            borderColor: //[
                                'rgb(169,82,13)',
                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual07['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual07['montodesc']) !!},
                            backgroundColor: //[
                                'rgba(142,16,115,0.2)',

                            borderColor: //[
                                'rgb(175,39,152)',

                            borderWidth: 1,
                            stack: 'Mes'
                        },


                    ]
                },
                options: {
                    tooltips: {
                        // enabled: true,
                        mode: 'label',
                        callbacks: {
                            label: function (tooltipItem, data) {
                                var corporation = data.datasets[tooltipItem.datasetIndex].label;
                                var valor = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                var total = 0;
                                for (var i = 0; i < data.datasets.length; i++)
                                    total += data.datasets[i].data[tooltipItem.index];
                                if (tooltipItem.datasetIndex !== data.datasets.length - 1) {
                                    return corporation + " : " + valor.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, ' ');
                                } else {
                                    return [corporation + " : " + valor.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, ' '), "TOTAL : " + Math.round((total + Number.EPSILON) * 100) / 100];
                                }
                            },
                            // labelColor:  'rgba(255, 159, 64, 1)',
                            // labelColor: function(tooltipItem, data) {
                            //     var dataset = data.config.data.datasets[tooltipItem.datasetIndex];
                            //     // if (tooltipItem.datasetIndex !== data.datasets.length - 1) {
                            //     //     return {
                            //     //         borderColor: dataset.borderColor,
                            //     //         backgroundColor: dataset.backgroundColor
                            //     //     }
                            //     // }
                            //     // else {
                            //     //     return {
                            //     //         borderColor: dataset.borderColor,
                            //     //         backgroundColor: dataset.backgroundColor
                            //     //     }
                            //     // }
                            //     return {
                            //         borderColor: dataset.borderColor,
                            //         backgroundColor: dataset.backgroundColor
                            //     }
                            //     // return {
                            //     //     borderColor: 'rgb(255, 0, 0)',
                            //     //     backgroundColor: 'rgb(255, 0, 0)'
                            //     // };
                            //
                            // },
                        }
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                             stacked: true
                        }],
                        yAxes: [{
                            display: true,
                            stacked: true
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        datalabels: {
                            formatter: function(value, index, values) {
                                if(value !=0 ){
                                    return value;
                                }else{
                                    value = "";
                                    return value;
                                }
                            },
                            display: 'auto',
                            //color: '#000000',
                        },
                    }
                }
            });

            var ctx = document.getElementById('descuentocantidadmensual-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataDescuentoMensual01['mesdescripcion']) !!},

                    datasets: [
                        {
                            label: {!! json_encode($dataDescuentoMensual12['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual12['cantidad']) !!},
                            backgroundColor: //[
                                'rgba(115, 255, 64, 0.2)',

                            borderColor: //[
                                'rgb(42, 177, 66, 1)',

                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual01['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual01['cantidad']) !!},
                            backgroundColor: //[
                                'rgba(54, 162, 235, 0.2)',

                            borderColor: //[
                                'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual02['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual02['cantidad']) !!},

                            backgroundColor: //[
                                'rgba(255, 99, 132, 0.2)',

                            borderColor: //[
                                'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual13['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual13 ['cantidad']) !!},
                            backgroundColor: //[
                                'rgba(255, 159, 64, 0.2)',

                            borderColor: //[
                                'rgba(255, 159, 64, 1)',

                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual05['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual05['cantidad']) !!},
                            backgroundColor: //[
                                'rgba(153, 102, 255, 0.2)',

                            borderColor: //[
                                'rgba(153, 102, 255, 1)',

                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual06['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual06['cantidad']) !!},

                            backgroundColor: //[
                                'rgb(140,96,49,0.2)',

                            borderColor: //[
                                'rgb(169,82,13)',
                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual07['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual07['cantidad']) !!},
                            backgroundColor: //[
                                'rgba(142,16,115,0.2)',

                            borderColor: //[
                                'rgb(175,39,152)',

                            borderWidth: 1,
                            stack: 'Mes'
                        },


                    ]
                },
                options: {
                    tooltips: {
                        enabled: true,
                        mode: 'label',
                        callbacks: {
                             label: function (tooltipItem, data) {
                                 var label = data.datasets[tooltipItem.datasetIndex].label;
                                 var valor = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                 var total = 0;
                                 for (var i = 0; i < data.datasets.length; i++)
                                     total += data.datasets[i].data[tooltipItem.index];

                                 if (tooltipItem.datasetIndex !== data.datasets.length - 1) {
                                     return label + " : " + valor;
                                 } else {
                                     return [label + " : " + valor, "TOTAL : " +total ];
                                 }
                                 //  return label+' '+ valor+ ' '+ total;
                                 // return label + " : " + valor.toFixed(2);
                             },

                            // labelColor:  'rgba(255, 159, 64, 1)',
                            // labelColor: function(tooltipItem, data) {
                            //     var dataset = data.config.data.datasets[tooltipItem.datasetIndex];
                            //     // if (tooltipItem.datasetIndex !== data.datasets.length - 1) {
                            //     //     return {
                            //     //         borderColor: dataset.borderColor,
                            //     //         backgroundColor: dataset.backgroundColor
                            //     //     }
                            //     // } else {
                            //     //     return {
                            //     //         borderColor: dataset.borderColor,
                            //     //         backgroundColor: dataset.backgroundColor
                            //     //     }
                            //     // }
                            //     return {
                            //         borderColor: dataset.borderColor,
                            //         backgroundColor: dataset.backgroundColor
                            //     }
                            //     // return {
                            //     //     borderColor: 'rgb(255, 0, 0)',
                            //     //     backgroundColor: 'rgb(255, 0, 0)'
                            //     // };
                            //
                            // },
                        }
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            stacked: true
                        }],
                        yAxes: [{
                            display: true,
                            stacked: true
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        datalabels: {
                            formatter: function(value, index, values) {
                                if(value !=0 ){
                                    return value;
                                }else{
                                    value = "";
                                    return value;
                                }
                            },
                            display: 'auto',
                            //color: '#000000',
                        },
                    }
                }
            });


            var ctx = document.getElementById('despachototaltipopago-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataDespachoTotalTipoPago['formapago']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataDespachoTotalTipoPago['cantidad']) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(115, 255, 64, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            //'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 159, 64, 0.2)',]

                        ,
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgb(42, 177, 66, 1)',
                            'rgba(153, 102, 255, 1)',
                            //'rgba(75, 192, 192, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 159, 64, 1)',],
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
                            display: 'auto',
                            //color: '#000000',
                        },
                    }
                }
            });

            var ctx = document.getElementById('despachototaltipoitem-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataDespachoTotalTipoItem['familia']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataDespachoTotalTipoItem['cantidad']) !!},
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
                            display: 'auto',
                            //color: '#000000',
                        },
                    }
                }
            });

            var ctx = document.getElementById('despachototaltipocliente-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataDespachoTotalTipoCliente['tipocliente']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataDespachoTotalTipoCliente['cantidad']) !!},
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
                            display: 'auto',
                            //color: '#000000',
                        },
                    }
                }
            });

            var ctx = document.getElementById('despachototalunidadnegocio-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataDespachoTotalUnidadNegocio['unidadnegocio']) !!},
                    datasets: [{
                        label: 'Millares',
                        data:{!! json_encode($dataDespachoTotalUnidadNegocio['cantidad']) !!},
                        backgroundColor:
                        // [
                        // 'rgba(255, 159, 64, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                        // ],
                        borderColor:
                        // [
                        // 'rgba(255, 159, 64, 1)',
                            'rgba(54, 162, 235, 1)',
                        // ],
                        borderWidth: 1
                    }]
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
                                    ctx.fillText(data, bar._model.x, bar._model.y - 5);
                                });
                            });
                        }
                    },
                }
            });

            var ctx = document.getElementById('descuentostopañoactual-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataDescuentoTopAñoActual['descripcion']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataDescuentoTopAñoActual['montodesc']) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(115, 255, 64, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgb(140,96,49,0.2)',
                            'rgba(142,16,115,0.2)',

                        ]

                        ,
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgb(42, 177, 66, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgb(169,82,13)',
                            'rgb(175,39,152)',

                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    //cutoutPercentage: 40,
                    responsive: true,
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
                                let percentage = (value*100 / sum).toFixed(0)+"%";
                                return percentage;
                            },
                            //color: '#000000',
                        }
                    }
                }
            });

            var ctx = document.getElementById('descuentostopañopasado-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataDescuentoTopAñoPasado['descripcion']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataDescuentoTopAñoPasado['montodesc']) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(115, 255, 64, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgb(140,96,49,0.2)',
                            'rgba(142,16,115,0.2)',

                        ]

                        ,
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgb(42, 177, 66, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgb(169,82,13)',
                            'rgb(175,39,152)',

                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    display: 'auto',
                    //cutoutPercentage: 40,
                    responsive: true,
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
                                let percentage = (value*100 / sum).toFixed(0)+"%";
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

            var ctx = document.getElementById('descuentostopacumulado-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataDescuentoTopAcumulado['descripcion']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataDescuentoTopAcumulado['montodesc']) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(115, 255, 64, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgb(140,96,49,0.2)',
                            'rgba(142,16,115,0.2)',
                            'rgb(12,105,88,0.2)',
                            'rgb(93,1,12,0.2)',
                            'rgb(0,12,105,0.2)',

                        ]

                        ,
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgb(42, 177, 66, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgb(169,82,13)',
                            'rgb(175,39,152)',
                            'rgb(12,105,88)',
                            'rgb(93,1,12)',
                            'rgb(0,12,105)',

                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    display: 'auto',
                    //cutoutPercentage: 40,
                    responsive: true,
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
                                let percentage = (value*100 / sum).toFixed(0)+"%";
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

        }
    </script>



@endsection
