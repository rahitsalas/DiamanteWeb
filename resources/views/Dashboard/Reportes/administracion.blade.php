@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
           <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Logística</h2>
                </div>
{{--                <div class="col-sm-6 mb-0">--}}
{{--                    <form method="POST" action="{{ route('postadministracion') }}" class="col-sm-10">--}}
{{--                        @csrf--}}
{{--                        <div class="row ">--}}
{{--                            <div class="col-sm-10 ">--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                              <span class="input-group-text">--}}
{{--                                                <i class="far fa-calendar-alt"></i>--}}
{{--                                              </span>--}}
{{--                                        </div>--}}
{{--                                        <input type="text" name="fechas" class="form-control float-right" id="filtrofecha" >--}}

{{--                                    </div>--}}
{{--                                    <!-- /.input group -->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-2">--}}
{{--                                <button type="submit" class="btn btn-primary">Procesar</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
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
                                <canvas id="pagospendientes42-chart" height="200"></canvas>
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

            //Date range picker
            //$('#reservation').daterangepicker()
            //Date range picker with time picker

            // $('#filtrofecha').daterangepicker({
            //     "locale": {
            //
            //         "format": "DD/MM/YYYY",
            //         "separator": " - ",
            //         "applyLabel": "Ok",
            //         "cancelLabel": "Cancel",
            //         "fromLabel": "Desde",
            //         "toLabel": "Hasta",
            //         minDate: '01/01/2012',
            //         maxDate: '12/31/2014',
            //         dateLimit: { days: 60 },
            //         // "customRangeLabel": "Custom",
            //         // "minYear": "2019",
            //         // "maxYear": parseInt(moment().format('YYYY'),10),
            //         "daysOfWeek": [
            //             "Do",
            //             "Lu",
            //             "Ma",
            //             "Mi",
            //             "Ju",
            //             "Vi",
            //             "Sa"
            //         ],
            //         "monthNames": [
            //             "Enero",
            //             "Febrero",
            //             "Marzo",
            //             "Abril",
            //             "Mayo",
            //             "Junio",
            //             "Julio",
            //             "Agusto",
            //             "Septiembre",
            //             "Octubre",
            //             "Noviembre",
            //             "Diciembre"
            //         ],
            //         "firstDay": 1
            //     }
            // })


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
                    maintainAspectRatio: true   ,
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
