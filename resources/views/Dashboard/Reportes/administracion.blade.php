@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
           <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Administración y Finanzas</h2>
                </div>
                <div class="col-sm-6 mb-0">
{{--                    <form method="POST" action="{{ route('comercialprocesar') }}">--}}
{{--                        <div class="row">--}}
{{--                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>--}}
{{--                            <textarea></textarea>--}}
{{--                            <button type="submit" class="btn btn-primary">Procesar</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                    <form method="POST" action="{{ route('postadministracion') }}" class="col-sm-10">
                        @csrf
                        <div class="row ">
                            <div class="col-sm-10 ">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                              </span>
                                        </div>
                                        <input type="text" name="fechas" class="form-control float-right" id="filtrofecha" >

                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Procesar</button>
                            </div>
                        </div>
                    </form>
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
{{--                            @if(Auth::user()->id==1)--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header border-0">--}}
{{--                                            <div class="d-flex justify-content-between">--}}
{{--                                                <h3 class="card-title">{{$startDate->format('Y-m')}}</h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="card-body pt-0 mt-0">--}}
{{--                                            <div class="d-flex">--}}
{{--                                                <p class="d-flex flex-column">--}}
{{--                                                    <span class="text-bold text-lg">Comparativo Anual</span>--}}
{{--                                            </div>--}}
{{--                                            <!-- /.d-flex -->--}}

{{--                                            <div class="position-relative mb-4">--}}
{{--                                                <canvas id="despachodiariomillartotal-chart" height="200"></canvas>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
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
{{--                            @if(Auth::user()->id==1)--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header border-0">--}}
{{--                                            <div class="d-flex justify-content-between">--}}
{{--                                                <h3 class="card-title">{{$startDate->format('Y-m')}}</h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="card-body pt-0 mt-0">--}}
{{--                                            <div class="d-flex">--}}
{{--                                                <p class="d-flex flex-column">--}}
{{--                                                    <span class="text-bold text-lg">Comparativo Anual</span>--}}
{{--                                            </div>--}}

{{--                                            <div class="position-relative mb-4">--}}
{{--                                                <canvas id="despachodiariosolestotal-chart" height="200"></canvas>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
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
                {{--                            @if(Auth::user()->id==1)--}}
                {{--                                <div class="col-md-3">--}}
                {{--                                    <div class="card">--}}
                {{--                                        <div class="card-header border-0">--}}
                {{--                                            <div class="d-flex justify-content-between">--}}
                {{--                                                <h3 class="card-title">{{$startDate->format('Y-m')}}</h3>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="card-body pt-0 mt-0">--}}
                {{--                                            <div class="d-flex">--}}
                {{--                                                <p class="d-flex flex-column">--}}
                {{--                                                    <span class="text-bold text-lg">Comparativo Anual</span>--}}
                {{--                                            </div>--}}

                {{--                                            <div class="position-relative mb-4">--}}
                {{--                                                <canvas id="despachodiariosolestotal-chart" height="200"></canvas>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            @endif--}}
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
        window.onload = function () {


            //Date range picker
            //$('#reservation').daterangepicker()
            //Date range picker with time picker

            $('#filtrofecha').daterangepicker({
                "locale": {

                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "Ok",
                    "cancelLabel": "Cancel",
                    "fromLabel": "Desde",
                    "toLabel": "Hasta",
                    minDate: '01/01/2012',
                    maxDate: '12/31/2014',
                    dateLimit: { days: 60 },
                    // "customRangeLabel": "Custom",
                    // "minYear": "2019",
                    // "maxYear": parseInt(moment().format('YYYY'),10),
                    "daysOfWeek": [
                        "Do",
                        "Lu",
                        "Ma",
                        "Mi",
                        "Ju",
                        "Vi",
                        "Sa"
                    ],
                    "monthNames": [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agusto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ],
                    "firstDay": 1
                }
            })


            var ctx = document.getElementById('ordencompraserviciosoles-chart').getContext('2d');
            var myChart = new Chart(ctx, {
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

            var ctx = document.getElementById('ordencompraservicioactivos-chart').getContext('2d');
            var myChart = new Chart(ctx, {
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
