@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
           <div class="row mt-2 mb-2">
               <div class="col-sm-6 mb-0">
                   <h2 class="m-0 text-dark">Ingresos por Cobranzas</h2>
               </div>
           </div>

            <div class="row">
               {{--               <div class="row">--}}
               <div class="col-md-12">
                   <div class="card ">
                       <div class="card-header border-0">
                           <div class="d-flex justify-content-between">
                               <h3 class="card-title">Ingresos Acumulados por Cobranzas {{$startDate->format('Y-m')}}</h3>
                               {{--                                <a href="javascript:void(0);">View Report</a>--}}
                           </div>
                       </div>
                       <div class="card-body pt-0 mt-0 mb-0 pb-0">
                           {{--                            <div class="d-flex">--}}
                           {{--                                <p class="d-flex flex-column">--}}
                           {{--                                    <span class="text-bold text-lg">Total {{$dataIngresosCobranzaAcumulado['total']}} Millares</span>--}}
                           {{--                                    <span></span>--}}
                           {{--                                </p>--}}
                           {{--                            </div>--}}

                           <div class="position-relative">
                               <canvas id="ingresocobranzaacumulado-chart" height="200"></canvas>
                           </div>
                       </div>
                       <div class="card-footer pt-0 mt-0 bg-white">
                        <span class="users-list-date mb-0">
                            *Solo se muestran Ingresos por Cobranzas
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
                               <h3 class="card-title">Ingresos Diarios por Cobranzas {{$startDate->format('Y-m')}}</h3>
                               {{--                                <a href="javascript:void(0);">View Report</a>--}}
                           </div>
                       </div>
                       <div class="card-body pt-0 mt-0 mb-0 pb-0">
                           <div class="d-flex">
                               <p class="d-flex flex-column">
                                   <span class="text-bold text-lg">Total {{$dataIngresosCobranzaDiario['total']}} Miles de Soles</span>
                                   <span></span>
                               </p>
                           </div>

                           <div class="position-relative">
                               <canvas id="ingresocobranzadiario-chart" height="200"></canvas>
                           </div>
                       </div>
                       <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *Solo se muestran Ingresos por Cobranzas
                            </span>
                       </div>
                   </div>
               </div>
            </div>

            <div class="row">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Cuentas por Cobrar Post-Covid</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Indice Morosidad: GENERAL</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="position-relative mb-4">
                                <canvas id="indicemorosidadgeneral-chart" height="200"></canvas>
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
                               <h3 class="card-title">Indice Morosidad: CLIENTE FINAL</h3>
                               <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseClienteFinal" aria-expanded="false" aria-controls="collapseClienteFinal">
                                   Top 5
                               </button>
                           </div>

                       </div>
                       <div class="card-body pt-0 mt-0">
                           <div class="position-relative mb-4">
                               <canvas id="indicemorosidadclientefinal-chart" height="200"></canvas>
                           </div>
                       </div>
                       <div class="collapse" id="collapseClienteFinal" >
                           <div class="card-footer pt-0 mt-0">
                               <table id="top5clientefinal" class="table table-bordered table-display" style="width: 100%">
                                   <thead>
                                   <tr>
                                       <th>CODIGO</th>
                                       <th>EMPRESA</th>
                                       <th>DIAS VENCIMIENTO</th>
                                       <th>SALDO</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   </tbody>
                               </table>
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
                               <h3 class="card-title">Indice Morosidad: FERRETERO</h3>
                               <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseFerretero" aria-expanded="false" aria-controls="collapseFerretero">
                                   Top 5
                               </button>
                           </div>
                       </div>
                       <div class="card-body pt-0 mt-0">
                           <div class="position-relative mb-4">
                               <canvas id="indicemorosidadferretero-chart" height="200"></canvas>
                           </div>
                       </div>
                       <div class="collapse" id="collapseFerretero" >
                           <div class="card-footer pt-0 mt-0">
                               <table id="top5ferretero" class="table table-bordered table-display" style="width: 100%">
                                   <thead>
                                   <tr>
                                       <th>CODIGO</th>
                                       <th>EMPRESA</th>
                                       <th>DIAS VENCIMIENTO</th>
                                       <th>SALDO</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   </tbody>
                               </table>
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
                               <h3 class="card-title">Indice Morosidad: DISTRIBUIDOR</h3>
                               <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDistribuidor" aria-expanded="false" aria-controls="collapseDistribuidor">
                                   Top 5
                               </button>
                           </div>
                       </div>
                       <div class="card-body pt-0 mt-0">
                           <div class="position-relative mb-4">
                               <canvas id="indicemorosidaddistribuidor-chart" height="200"></canvas>
                           </div>
                       </div>
                       <div class="collapse" id="collapseDistribuidor" >
                           <div class="card-footer pt-0 mt-0">
                               <table id="top5distribuidor" class="table table-bordered table-display" style="width: 100%">
                                   <thead>
                                   <tr>
                                       <th>CODIGO</th>
                                       <th>EMPRESA</th>
                                       <th>DIAS VENCIMIENTO</th>
                                       <th>SALDO</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   </tbody>
                               </table>
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
                               <h3 class="card-title">Indice Morosidad: CONSTRUCTORA</h3>
                               <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseConstructora" aria-expanded="false" aria-controls="collapseConstructora">
                                   Top 5
                               </button>
                           </div>
                       </div>
                       <div class="card-body pt-0 mt-0">
                           <div class="position-relative mb-4">
                               <canvas id="indicemorosidadconstructora-chart" height="200"></canvas>
                           </div>
                       </div>
                       <div class="collapse" id="collapseConstructora" >
                           <div class="card-footer pt-0 mt-0">
                               <table id="top5constructura" class="table table-bordered table-display" style="width: 100%">
                                   <thead>
                                   <tr>
                                       <th>CODIGO</th>
                                       <th>EMPRESA</th>
                                       <th>DIAS VENCIMIENTO</th>
                                       <th>SALDO</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   </tbody>
                               </table>
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
                               <h3 class="card-title">Indice Morosidad: MEGACENTRO</h3>
                               <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMegacentro" aria-expanded="false" aria-controls="collapseMegacentro">
                                   Top 5
                               </button>
                           </div>
                       </div>
                       <div class="card-body pt-0 mt-0">
                           <div class="position-relative mb-4">
                               <canvas id="indicemorosidadmegacentro-chart" height="200"></canvas>
                           </div>
                       </div>
                       <div class="collapse" id="collapseMegacentro" >
                           <div class="card-footer pt-0 mt-0">
                               <table id="top5megacentro" class="table table-bordered table-display" style="width: 100%">
                                   <thead>
                                   <tr>
                                       <th>CODIGO</th>
                                       <th>EMPRESA</th>
                                       <th>DIAS VENCIMIENTO</th>
                                       <th>SALDO</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   </tbody>
                               </table>
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
                               <h3 class="card-title">Indice Morosidad: SECTOR PUBLICO</h3>
                               <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSectorPublico" aria-expanded="false" aria-controls="collapseSectorPublico">
                                   Top 5
                               </button>
                           </div>
                       </div>
                       <div class="card-body pt-0 mt-0">
                           <div class="position-relative mb-4">
                               <canvas id="indicemorosidadsectorpublico-chart" height="200"></canvas>
                           </div>
                       </div>
                       <div class="collapse" id="collapseSectorPublico" >
                           <div class="card-footer pt-0 mt-0">
                               <table id="top5sectorpublico" class="table table-bordered table-display" style="width: 100%">
                                   <thead>
                                   <tr>
                                       <th>CODIGO</th>
                                       <th>EMPRESA</th>
                                       <th>DIAS VENCIMIENTO</th>
                                       <th>SALDO</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
            </div>


            <div class="row">
               <div class="col-12">
                   <div class="card">
                       <div class="card-header">
                           <h3 class="card-title">Distribución de Deuda Vencida</h3>
                       </div>
                       <!-- /.card-header -->
                       <div class="card-body">
                           <table id="distribuciondeudavencida" class="table table-bordered table-display"  >
                               <thead>
                               <tr>
                                   <th>CODIGO</th>
                                   <th>SEGMENTO</th>
                                   <th>DIAS VENCIMIENTO</th>
                                   <th>TOTAL</th>
                                   <th>%</th>
                               </tr>
                               </thead>
                               <tbody>
                               </tbody>
                           </table>
                       </div>
                       <!-- /.card-body -->
                   </div>
               </div>
            </div>

               <div class="col-sm-8 mb-0">
                   <h2 class="m-0 text-dark">Cuentas por Cobrar - Total (Pre-Post Covid)</h2>
               </div>

{{--               </div>--}}

{{--               <div class="row">--}}
            <div class="row">
               <div class="col-md-12">
                   <div class="card ">
                       <div class="card-header border-0">
                           <div class="d-flex justify-content-between">
                               <h3 class="card-title">Deuda Morosa 80/20 {{$startDate->format('Y-m-d')}}</h3>
                               {{--                                <a href="javascript:void(0);">View Report</a>--}}
                           </div>
                       </div>
                       <div class="card-body pt-0 mt-0 mb-0 pb-0">
                           <div class="d-flex mb-0 pb-0">
                               <p class="d-flex flex-column mb-0 pb-0 mr-2">
                                   <span class="text-bold text-lg">Total {{$dataCobranzaDeudaMorosa['total']}} Miles de Soles</span>
                                   <span></span>
                               </p>
                           </div>

                           <div class="position-relative">
                               <canvas id="cobranzadeudamorosa-chart" height="100"></canvas>
                           </div>
                       </div>
                       <div class="card-footer pt-0 mt-0 bg-white">
                <span class="users-list-date mb-0">
                    *Otros esta compuesto por varios clientes (20%)
                </span>
                       </div>
                   </div>
               </div>
{{--               </div>--}}
            </div>
            <div class="row">
               <div class="col-md-4">
                   <div class="card ">
                       <div class="card-header border-0">
                           <div class="d-flex justify-content-between">
                               <h3 class="card-title">Clasificación de Cobranza Pendiente</h3>
                               {{--                                <a href="javascript:void(0);">View Report</a>--}}
                           </div>
                       </div>
                       <div class="card-body pt-0 mt-0">
                           <div class="d-flex">
                               <p class="d-flex flex-column">
                                   <span class="text-bold text-lg">Total {{$dataCobranzaClasificacion['total']}} Miles de Soles</span>
                                   <span></span>
                               </p>
                           </div>
                           <div class="position-relative mb-4">
                               <canvas id="cobranzaclasificacionvencimiento-chart" height="200"></canvas>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-4">
                   <div class="card ">
                       <div class="card-header border-0">
                           <div class="d-flex justify-content-between">
                               <h3 class="card-title">Clasificación de Cobranza Vencida</h3>
                               {{--                                                                <a href="javascript:void(0);">View Report</a>--}}
                           </div>
                       </div>
                       <div class="card-body pt-0 mt-0">
                           <div class="d-flex">
                               <p class="d-flex flex-column">
                                   <span class="text-bold text-lg">Total {{$dataCobranzaClasificacionVencida['total']}} Miles de Soles</span>
                                   <span></span>
                               </p>
                           </div>
                           <div class="position-relative mb-4">
                               <canvas id="cobranzaclasificacionvencida-chart" height="200"></canvas>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-4">
                   <div class="card">
                       <div class="card-header border-0">
                           <div class="d-flex justify-content-between">
                               <h3 class="card-title">Clasificación Cobranza x Vencer</h3>
                           </div>
                       </div>
                       <div class="card-body pt-0 mt-0">
                           <div class="d-flex">
                               <p class="d-flex flex-column">
                                   <span class="text-bold text-lg">Total {{$dataCobranzaClasificacionxVencer['total']}} Miles de Soles</span>
                           </div>

                           <div class="position-relative mb-4">
                               <canvas id="cobranzaclasificacionxvencer-chart" height="200"></canvas>
                           </div>
                       </div>
                   </div>
               </div>
            </div>

{{--            <div class="row">--}}
{{--               <div class="col-12">--}}
{{--                   <div class="card">--}}
{{--                       <div class="card-header">--}}
{{--                           <h3 class="card-title">ESTADO DE CUENTA GENERAL</h3>--}}
{{--                       </div>--}}
{{--                       <!-- /.card-header -->--}}
{{--                       <div class="card-body">--}}
{{--                           <table id="resumencrobanzas" class="table table-bordered table-display"  >--}}
{{--                               <thead>--}}
{{--                               <tr>--}}
{{--                                   <th>CODIGO</th>--}}
{{--                                   <th>SEGMENTO</th>--}}
{{--                                   <th>DIAS VENCIMIENTO</th>--}}
{{--                                   <th>TOTAL</th>--}}
{{--                                   <th>%</th>--}}
{{--                               </tr>--}}
{{--                               </thead>--}}
{{--                               <tbody>--}}
{{--                               </tbody>--}}
{{--                           </table>--}}
{{--                       </div>--}}
{{--                       <!-- /.card-body -->--}}
{{--                   </div>--}}
{{--               </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="col-md-4">--}}
{{--                   <div class="card ">--}}
{{--                       <div class="card-header border-0">--}}
{{--                           <div class="d-flex justify-content-between">--}}
{{--                               <h3 class="card-title">Clasificación de Deuda</h3>--}}
{{--                               --}}{{--                                <a href="javascript:void(0);">View Report</a>--}}
{{--                           </div>--}}
{{--                       </div>--}}
{{--                       <div class="card-body pt-0 mt-0">--}}
{{--                           <div class="d-flex">--}}
{{--                               <p class="d-flex flex-column">--}}
{{--                                                       <span class="text-bold text-lg">Total {{$dataDeudaClasificacion['total']}} Miles de Soles</span>--}}
{{--                                   <span></span>--}}
{{--                               </p>--}}
{{--                           </div>--}}
{{--                           <div class="position-relative mb-4">--}}
{{--                               <canvas id="deudaclasificacion-chart" height="200"></canvas>--}}
{{--                           </div>--}}
{{--                       </div>--}}
{{--                   </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4">--}}
{{--                   <div class="card ">--}}
{{--                       <div class="card-header border-0">--}}
{{--                           <div class="d-flex justify-content-between">--}}
{{--                               <h3 class="card-title">Clasificación de Deuda con Despacho</h3>--}}
{{--                               --}}{{--                                <a href="javascript:void(0);">View Report</a>--}}
{{--                           </div>--}}
{{--                       </div>--}}
{{--                       <div class="card-body pt-0 mt-0">--}}
{{--                           <div class="d-flex">--}}
{{--                               <p class="d-flex flex-column">--}}
{{--                                                       <span class="text-bold text-lg">Total {{$dataDeudaClasificacionCon['total']}} Miles de Soles</span>--}}
{{--                                   <span></span>--}}
{{--                               </p>--}}
{{--                           </div>--}}
{{--                           <div class="position-relative mb-4">--}}
{{--                               <canvas id="deudacondespachoclasificacion-chart" height="200"></canvas>--}}
{{--                           </div>--}}
{{--                       </div>--}}
{{--                   </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4">--}}
{{--                   <div class="card">--}}
{{--                       <div class="card-header border-0">--}}
{{--                           <div class="d-flex justify-content-between">--}}
{{--                               <h3 class="card-title">Clasificación de Deuda sin Despacho</h3>--}}
{{--                           </div>--}}
{{--                       </div>--}}
{{--                       <div class="card-body pt-0 mt-0">--}}
{{--                           <div class="d-flex">--}}
{{--                               <p class="d-flex flex-column">--}}
{{--                                                       <span class="text-bold text-lg">Total {{$dataDeudaClasificacionSin['total']}} Miles de Soles </span>--}}
{{--                           </div>--}}

{{--                           <div class="position-relative mb-4">--}}
{{--                               <canvas id="deudasindespachoclasificacion-chart" height="200"></canvas>--}}
{{--                           </div>--}}
{{--                       </div>--}}
{{--                   </div>--}}
{{--                </div>--}}
{{--            </div>--}}


        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
        window.onload = function () {
            Chart.plugins.unregister(ChartDataLabels);

            var ctx = document.getElementById('indicemorosidadgeneral-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceMorosidad00['fecha']) !!},
                    datasets: [
                        {
                        label: 'Morosidad Real',
                        yAxisID: 'A',
                        data:{!! json_encode($dataIndiceMorosidad00['indice']) !!},
                        type: 'line',
                        backgroundColor: //[
                            'rgb(240, 52, 52)',

                        borderColor: //[
                            'rgb(240, 52, 52)',
                        borderWidth: 3,
                        pointBackgroundColor: 'rgb(240, 52, 52)',
                        fill: false,
                        borderDash: [10,5],
                        pointRadius: 1,
                        hoverBackgroundColor: 'rgb(240, 52, 52)',
                        datalabels: {
                            formatter: (value, ctx) => {
                                let sum = 0;
                                let dataArr = ctx.chart.data.datasets[0].data;
                                dataArr.map(data => {
                                    sum += data;
                                });
                                let percentage = value+"%";
                                // if((value*100 / sum)>5) {
                                return percentage;

                            },

                            anchor: 'end',
                            align: 'top',
                            offset: 1,
                            // display: 'auto',
                            color: '#000000',
                            clamp: true,
                            font: {
                                weight: 'bold',
                            },
                        },
                    },

                        {
                            label: 'Objetivo - 7%',
                            type: 'line',
                            data:{!! json_encode($dataIndiceMorosidad00['objetivo']) !!},
                            backgroundColor: //[
                                'rgb(0,0,245,0.7)',

                            borderColor: //[
                                'rgb(0,0,245,0.7)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(0,0,245,0.7)',
                             fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(0,0,245,0.7)',

                            datalabels: {
                                display: 'false',
                                hidden: true,
                                color: 'rgb(66,6,245,0)',
                            //     clamp: true,
                             },
                        },

                        {
                            label: 'Total S/ K',
                            yAxisID: 'B',
                            data:{!! json_encode($dataIndiceMorosidad00['total']) !!},
                            backgroundColor: //[
                                'rgb(195,194,198,0.5)',

                            borderColor: //[
                                'rgb(0,0,0,0.5)',
                            borderWidth: 1.5,
                            pointBackgroundColor: 'rgb(0,0,0)',
                            // fill: false,
                            borderDash: [10,5],
                            pointRadius: 0.5,
                            hoverBackgroundColor: 'rgb(255,255,255)',

                            datalabels: {

                                anchor: 'end',
                                align: 'bottom',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,

                            },
                        },


                    ]
                },
                options: {
                    legend: {
                        position:'bottom'
                    },
                    scales: {
                        xAxes: [{
                            // display: true,
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            id: 'A',
                            type: 'linear',
                            position: 'left',
                            ticks: {
                                max: 40,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }, {
                            id: 'B',
                            type: 'linear',
                            position: 'right',
                            ticks: {
                                max: 1000,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            var ctx = document.getElementById('indicemorosidadclientefinal-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceMorosidad01['fecha']) !!},
                    datasets: [
                        {
                            label: 'Morosidad Real',
                            yAxisID: 'A',
                            data:{!! json_encode($dataIndiceMorosidad01['indice']) !!},
                            type: 'line',
                            backgroundColor: //[
                                'rgb(240, 52, 52)',

                            borderColor: //[
                                'rgb(240, 52, 52)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(240, 52, 52)',
                            fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(240, 52, 52)',
                            datalabels: {
                                formatter: (value, ctx) => {
                                    let sum = 0;
                                    let dataArr = ctx.chart.data.datasets[0].data;
                                    dataArr.map(data => {
                                        sum += data;
                                    });
                                    let percentage = value+"%";
                                    // if((value*100 / sum)>5) {
                                    return percentage;

                                },

                                anchor: 'end',
                                align: 'top',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,
                                font: {
                                    weight: 'bold',
                                },
                            },
                        },

                        {
                            label: 'Objetivo - 7%',
                            type: 'line',
                            data:{!! json_encode($dataIndiceMorosidad01['objetivo']) !!},
                            backgroundColor: //[
                                'rgb(0,0,245,0.7)',

                            borderColor: //[
                                'rgb(0,0,245,0.7)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(0,0,245,0.7)',
                            fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(0,0,245,0.7)',

                            datalabels: {
                                display: 'false',
                                hidden: true,
                                color: 'rgb(66,6,245,0)',
                                //     clamp: true,
                            },
                        },

                        {
                            label: 'Total S/ K',
                            yAxisID: 'B',
                            data:{!! json_encode($dataIndiceMorosidad01['total']) !!},
                            backgroundColor: //[
                                'rgb(195,194,198,0.5)',

                            borderColor: //[
                                'rgb(0,0,0,0.5)',
                            borderWidth: 1.5,
                            pointBackgroundColor: 'rgb(0,0,0)',
                            // fill: false,
                            borderDash: [10,5],
                            pointRadius: 0.5,
                            hoverBackgroundColor: 'rgb(255,255,255)',

                            datalabels: {

                                anchor: 'end',
                                align: 'bottom',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,

                            },
                        },


                    ]
                },
                options: {
                    legend: {
                        position:'bottom'
                    },
                    scales: {
                        xAxes: [{
                            // display: true,
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            id: 'A',
                            type: 'linear',
                            position: 'left',
                            ticks: {
                                max: 200,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }, {
                            id: 'B',
                            type: 'linear',
                            position: 'right',
                            ticks: {
                                max: 140,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            var ctx = document.getElementById('indicemorosidadconstructora-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceMorosidad02['fecha']) !!},
                    datasets: [
                        {
                            label: 'Morosidad Real',
                            yAxisID: 'A',
                            data:{!! json_encode($dataIndiceMorosidad02['indice']) !!},
                            type: 'line',
                            backgroundColor: //[
                                'rgb(240, 52, 52)',

                            borderColor: //[
                                'rgb(240, 52, 52)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(240, 52, 52)',
                            fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(240, 52, 52)',
                            datalabels: {
                                formatter: (value, ctx) => {
                                    let sum = 0;
                                    let dataArr = ctx.chart.data.datasets[0].data;
                                    dataArr.map(data => {
                                        sum += data;
                                    });
                                    let percentage = value+"%";
                                    // if((value*100 / sum)>5) {
                                    return percentage;

                                },

                                anchor: 'end',
                                align: 'top',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,
                                font: {
                                    weight: 'bold',
                                },
                            },
                        },

                        {
                            label: 'Objetivo - 7%',
                            type: 'line',
                            data:{!! json_encode($dataIndiceMorosidad02['objetivo']) !!},
                            backgroundColor: //[
                                'rgb(0,0,245,0.7)',

                            borderColor: //[
                                'rgb(0,0,245,0.7)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(0,0,245,0.7)',
                            fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(0,0,245,0.7)',

                            datalabels: {
                                display: 'false',
                                hidden: true,
                                color: 'rgb(66,6,245,0)',
                                //     clamp: true,
                            },
                        },

                        {
                            label: 'Total S/ K',
                            yAxisID: 'B',
                            data:{!! json_encode($dataIndiceMorosidad02['total']) !!},
                            backgroundColor: //[
                                'rgb(195,194,198,0.5)',

                            borderColor: //[
                                'rgb(0,0,0,0.5)',
                            borderWidth: 1.5,
                            pointBackgroundColor: 'rgb(0,0,0)',
                            // fill: false,
                            borderDash: [10,5],
                            pointRadius: 0.5,
                            hoverBackgroundColor: 'rgb(255,255,255)',

                            datalabels: {

                                anchor: 'end',
                                align: 'bottom',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,

                            },
                        },


                    ]
                },
                options: {
                    legend: {
                        position:'bottom'
                    },
                    scales: {
                        xAxes: [{
                            // display: true,
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            id: 'A',
                            type: 'linear',
                            position: 'left',
                            ticks: {
                                max: 100,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }, {
                            id: 'B',
                            type: 'linear',
                            position: 'right',
                            ticks: {
                                max: 80,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            var ctx = document.getElementById('indicemorosidadmegacentro-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceMorosidad05['fecha']) !!},
                    datasets: [
                        {
                            label: 'Morosidad Real',
                            yAxisID: 'A',
                            data:{!! json_encode($dataIndiceMorosidad05['indice']) !!},
                            type: 'line',
                            backgroundColor: //[
                                'rgb(240, 52, 52)',

                            borderColor: //[
                                'rgb(240, 52, 52)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(240, 52, 52)',
                            fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(240, 52, 52)',
                            datalabels: {
                                formatter: (value, ctx) => {
                                    let sum = 0;
                                    let dataArr = ctx.chart.data.datasets[0].data;
                                    dataArr.map(data => {
                                        sum += data;
                                    });
                                    let percentage = value+"%";
                                    // if((value*100 / sum)>5) {
                                    return percentage;

                                },

                                anchor: 'end',
                                align: 'top',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,
                                font: {
                                    weight: 'bold',
                                },
                            },
                        },

                        {
                            label: 'Objetivo - 7%',
                            type: 'line',
                            data:{!! json_encode($dataIndiceMorosidad05['objetivo']) !!},
                            backgroundColor: //[
                                'rgb(0,0,245,0.7)',

                            borderColor: //[
                                'rgb(0,0,245,0.7)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(0,0,245,0.7)',
                            fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(0,0,245,0.7)',

                            datalabels: {
                                display: 'false',
                                hidden: true,
                                color: 'rgb(66,6,245,0)',
                                //     clamp: true,
                            },
                        },

                        {
                            label: 'Total S/ K',
                            yAxisID: 'B',
                            data:{!! json_encode($dataIndiceMorosidad05['total']) !!},
                            backgroundColor: //[
                                'rgb(195,194,198,0.5)',

                            borderColor: //[
                                'rgb(0,0,0,0.5)',
                            borderWidth: 1.5,
                            pointBackgroundColor: 'rgb(0,0,0)',
                            // fill: false,
                            borderDash: [10,5],
                            pointRadius: 0.5,
                            hoverBackgroundColor: 'rgb(255,255,255)',

                            datalabels: {

                                anchor: 'end',
                                align: 'bottom',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,

                            },
                        },


                    ]
                },
                options: {
                    legend: {
                        position:'bottom'
                    },
                    scales: {
                        xAxes: [{
                            // display: true,
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            id: 'A',
                            type: 'linear',
                            position: 'left',
                            ticks: {
                                max: 100,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }, {
                            id: 'B',
                            type: 'linear',
                            position: 'right',
                            ticks: {
                                max: 1000,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            var ctx = document.getElementById('indicemorosidadsectorpublico-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceMorosidad06['fecha']) !!},
                    datasets: [
                        {
                            label: 'Morosidad Real',
                            yAxisID: 'A',
                            data:{!! json_encode($dataIndiceMorosidad06['indice']) !!},
                            type: 'line',
                            backgroundColor: //[
                                'rgb(240, 52, 52)',

                            borderColor: //[
                                'rgb(240, 52, 52)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(240, 52, 52)',
                            fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(240, 52, 52)',
                            datalabels: {
                                formatter: (value, ctx) => {
                                    let sum = 0;
                                    let dataArr = ctx.chart.data.datasets[0].data;
                                    dataArr.map(data => {
                                        sum += data;
                                    });
                                    let percentage = value+"%";
                                    // if((value*100 / sum)>5) {
                                    return percentage;

                                },

                                anchor: 'end',
                                align: 'top',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,
                                font: {
                                    weight: 'bold',
                                },
                            },
                        },

                        {
                            label: 'Objetivo - 7%',
                            type: 'line',
                            data:{!! json_encode($dataIndiceMorosidad06['objetivo']) !!},
                            backgroundColor: //[
                                'rgb(0,0,245,0.7)',

                            borderColor: //[
                                'rgb(0,0,245,0.7)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(0,0,245,0.7)',
                            fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(0,0,245,0.7)',

                            datalabels: {
                                display: 'false',
                                hidden: true,
                                color: 'rgb(66,6,245,0)',
                                //     clamp: true,
                            },
                        },

                        {
                            label: 'Total S/ K',
                            yAxisID: 'B',
                            data:{!! json_encode($dataIndiceMorosidad06['total']) !!},
                            backgroundColor: //[
                                'rgb(195,194,198,0.5)',

                            borderColor: //[
                                'rgb(0,0,0,0.5)',
                            borderWidth: 1.5,
                            pointBackgroundColor: 'rgb(0,0,0)',
                            // fill: false,
                            borderDash: [10,5],
                            pointRadius: 0.5,
                            hoverBackgroundColor: 'rgb(255,255,255)',

                            datalabels: {

                                anchor: 'end',
                                align: 'bottom',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,

                            },
                        },


                    ]
                },
                options: {
                    legend: {
                        position:'bottom'
                    },
                    scales: {
                        xAxes: [{
                            // display: true,
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            id: 'A',
                            type: 'linear',
                            position: 'left',
                            ticks: {
                                max: 50,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }, {
                            id: 'B',
                            type: 'linear',
                            position: 'right',
                            ticks: {
                                max: 20,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            var ctx = document.getElementById('indicemorosidadferretero-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceMorosidad12['fecha']) !!},
                    datasets: [
                        {
                            label: 'Morosidad Real',
                            yAxisID: 'A',
                            data:{!! json_encode($dataIndiceMorosidad12['indice']) !!},
                            type: 'line',
                            backgroundColor: //[
                                'rgb(240, 52, 52)',

                            borderColor: //[
                                'rgb(240, 52, 52)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(240, 52, 52)',
                            fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(240, 52, 52)',
                            datalabels: {
                                formatter: (value, ctx) => {
                                    let sum = 0;
                                    let dataArr = ctx.chart.data.datasets[0].data;
                                    dataArr.map(data => {
                                        sum += data;
                                    });
                                    let percentage = value+"%";
                                    // if((value*100 / sum)>5) {
                                    return percentage;

                                },

                                anchor: 'end',
                                align: 'top',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,
                                font: {
                                    weight: 'bold',
                                },
                            },
                        },

                        {
                            label: 'Objetivo - 7%',
                            type: 'line',
                            data:{!! json_encode($dataIndiceMorosidad12['objetivo']) !!},
                            backgroundColor: //[
                                'rgb(0,0,245,0.7)',

                            borderColor: //[
                                'rgb(0,0,245,0.7)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(0,0,245,0.7)',
                            fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(0,0,245,0.7)',

                            datalabels: {
                                display: 'false',
                                hidden: true,
                                color: 'rgb(66,6,245,0)',
                                //     clamp: true,
                            },
                        },

                        {
                            label: 'Total S/ K',
                            yAxisID: 'B',
                            data:{!! json_encode($dataIndiceMorosidad12['total']) !!},
                            backgroundColor: //[
                                'rgb(195,194,198,0.5)',

                            borderColor: //[
                                'rgb(0,0,0,0.5)',
                            borderWidth: 1.5,
                            pointBackgroundColor: 'rgb(0,0,0)',
                            // fill: false,
                            borderDash: [10,5],
                            pointRadius: 0.5,
                            hoverBackgroundColor: 'rgb(255,255,255)',

                            datalabels: {

                                anchor: 'end',
                                align: 'bottom',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,

                            },
                        },


                    ]
                },
                options: {
                    legend: {
                        position:'bottom'
                    },
                    scales: {
                        xAxes: [{
                            // display: true,
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            id: 'A',
                            type: 'linear',
                            position: 'left',
                            ticks: {
                                max: 40,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }, {
                            id: 'B',
                            type: 'linear',
                            position: 'right',
                            ticks: {
                                max: 400,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });

            var ctx = document.getElementById('indicemorosidaddistribuidor-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceMorosidad13['fecha']) !!},
                    datasets: [
                        {
                            label: 'Morosidad Real',
                            yAxisID: 'A',
                            data:{!! json_encode($dataIndiceMorosidad13['indice']) !!},
                            type: 'line',
                            backgroundColor: //[
                                'rgb(240, 52, 52)',

                            borderColor: //[
                                'rgb(240, 52, 52)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(240, 52, 52)',
                            fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(240, 52, 52)',
                            datalabels: {
                                formatter: (value, ctx) => {
                                    let sum = 0;
                                    let dataArr = ctx.chart.data.datasets[0].data;
                                    dataArr.map(data => {
                                        sum += data;
                                    });
                                    let percentage = value+"%";
                                    // if((value*100 / sum)>5) {
                                    return percentage;

                                },

                                anchor: 'end',
                                align: 'top',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,
                                font: {
                                    weight: 'bold',
                                },
                            },
                        },

                        {
                            label: 'Objetivo - 7%',
                            type: 'line',
                            data:{!! json_encode($dataIndiceMorosidad13['objetivo']) !!},
                            backgroundColor: //[
                                'rgb(0,0,245,0.7)',

                            borderColor: //[
                                'rgb(0,0,245,0.7)',
                            borderWidth: 3,
                            pointBackgroundColor: 'rgb(0,0,245,0.7)',
                            fill: false,
                            borderDash: [10,5],
                            pointRadius: 1,
                            hoverBackgroundColor: 'rgb(0,0,245,0.7)',

                            datalabels: {
                                display: 'false',
                                hidden: true,
                                color: 'rgb(66,6,245,0)',
                                //     clamp: true,
                            },
                        },

                        {
                            label: 'Total S/ K',
                            yAxisID: 'B',
                            data:{!! json_encode($dataIndiceMorosidad13['total']) !!},
                            backgroundColor: //[
                                'rgb(195,194,198,0.5)',

                            borderColor: //[
                                'rgb(0,0,0,0.5)',
                            borderWidth: 1.5,
                            pointBackgroundColor: 'rgb(0,0,0)',
                            // fill: false,
                            borderDash: [10,5],
                            pointRadius: 0.5,
                            hoverBackgroundColor: 'rgb(255,255,255)',

                            datalabels: {

                                anchor: 'end',
                                align: 'bottom',
                                offset: 1,
                                // display: 'auto',
                                color: '#000000',
                                clamp: true,

                            },
                        },


                    ]
                },
                options: {
                    legend: {
                        position:'bottom'
                    },
                    scales: {
                        xAxes: [{
                            // display: true,
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            id: 'A',
                            type: 'linear',
                            position: 'left',
                            ticks: {
                                max: 50,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }, {
                            id: 'B',
                            type: 'linear',
                            position: 'right',
                            ticks: {
                                max: 250,
                                min: 0
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });


            var ctx = document.getElementById('ingresocobranzaacumulado-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIngresosCobranzaAcumulado['fecha']) !!},
                    datasets: [{
                        label: 'Millones de Soles',
                        data:{!! json_encode($dataIngresosCobranzaAcumulado['monto']) !!},
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

            var ctx = document.getElementById('cobranzadeudamorosa-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'horizontalBar',
                data: {
                    labels: {!! json_encode($dataCobranzaDeudaMorosa['cliente']) !!},
                    datasets: [{
                        label: 'Miles de Soles',
                        data:{!! json_encode($dataCobranzaDeudaMorosa['monto']) !!},
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
                    // responsive: true,
                    // maintainAspectRatio: true   ,
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
                                    ctx.fillText(data, bar._model.x+15, bar._model.y+7.5);
                                });
                            });
                        }
                    },
                }
            });

            var ctx = document.getElementById('cobranzaclasificacionvencimiento-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataCobranzaClasificacion['vencidaflag']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataCobranzaClasificacion['monto']) !!},
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
                                let percentage = (value*100 / sum).toFixed(0)+"%";
                                // if((value*100 / sum)>5) {
                                return percentage;
                                // }
                                // else{
                                //     return null;
                                // }

                            },

                            // anchor: 'end',
                            // align: 'end',
                            // offset: 10,
                            display: 'auto',
                            //color: '#000000',
                        },

                    }
                }
            });

            var ctx = document.getElementById('cobranzaclasificacionvencida-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataCobranzaClasificacionVencida['clasificacion']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataCobranzaClasificacionVencida['monto']) !!},
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

            var ctx = document.getElementById('cobranzaclasificacionxvencer-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($dataCobranzaClasificacionxVencer['clasificacion']) !!},
                    datasets: [{
                        label: '# of Tomatoes',
                        data: {!! json_encode($dataCobranzaClasificacionxVencer['monto']) !!},
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

            {{--var ctx = document.getElementById('deudaclasificacion-chart').getContext('2d');--}}
            {{--var myChart = new Chart(ctx, {--}}
            {{--    plugins: [ChartDataLabels],--}}
            {{--    type: 'doughnut',--}}
            {{--    data: {--}}
            {{--        labels: {!! json_encode($dataDeudaClasificacion['clasificacion']) !!},--}}
            {{--        datasets: [{--}}
            {{--            label: '# of Tomatoes',--}}
            {{--            data: {!! json_encode($dataDeudaClasificacion['monto']) !!},--}}
            {{--            backgroundColor: [--}}
            {{--                'rgba(255, 99, 132, 0.2)',--}}
            {{--                'rgba(54, 162, 235, 0.2)',--}}
            {{--                'rgba(255, 159, 64, 0.2)',--}}
            {{--                'rgba(115, 255, 64, 0.2)',--}}
            {{--                //'rgba(75, 192, 192, 0.2)',--}}
            {{--                // 'rgba(255, 206, 86, 0.2)',--}}

            {{--                'rgba(153, 102, 255, 0.2)',]--}}

            {{--            ,--}}
            {{--            borderColor: [--}}
            {{--                'rgba(255, 99, 132, 1)',--}}
            {{--                'rgba(54, 162, 235, 1)',--}}
            {{--                'rgba(255, 159, 64, 1)',--}}
            {{--                'rgb(42, 177, 66, 1)',--}}
            {{--                //'rgba(75, 192, 192, 1)',--}}
            {{--                // 'rgba(255, 206, 86, 1)',--}}

            {{--                'rgba(153, 102, 255, 1)',],--}}
            {{--            borderWidth: 1--}}
            {{--        }]--}}
            {{--    },--}}
            {{--    options: {--}}
            {{--        display: 'auto',--}}
            {{--        //cutoutPercentage: 40,--}}
            {{--        responsive: false,--}}
            {{--        tooltips: {--}}
            {{--            enabled: true,--}}
            {{--        },--}}
            {{--        plugins: {--}}
            {{--            datalabels: {--}}
            {{--                formatter: (value, ctx) => {--}}
            {{--                    let sum = 0;--}}
            {{--                    let dataArr = ctx.chart.data.datasets[0].data;--}}
            {{--                    dataArr.map(data => {--}}
            {{--                        sum += data;--}}
            {{--                    });--}}
            {{--                    let percentage = (value*100 / sum).toFixed(0)+"%";--}}
            {{--                    // if((value*100 / sum)>5) {--}}
            {{--                    return percentage;--}}
            {{--                    // }--}}
            {{--                    // else{--}}
            {{--                    //     return null;--}}
            {{--                    // }--}}

            {{--                },--}}

            {{--                // anchor: 'end',--}}
            {{--                // align: 'end',--}}
            {{--                // offset: 10,--}}
            {{--                display: 'auto',--}}
            {{--                //color: '#000000',--}}
            {{--            },--}}

            {{--        }--}}
            {{--    }--}}
            {{--});--}}

            {{--var ctx = document.getElementById('deudacondespachoclasificacion-chart').getContext('2d');--}}
            {{--var myChart = new Chart(ctx, {--}}
            {{--    plugins: [ChartDataLabels],--}}
            {{--    type: 'doughnut',--}}
            {{--    data: {--}}
            {{--        labels: {!! json_encode($dataDeudaClasificacionCon['clasificacion']) !!},--}}
            {{--        datasets: [{--}}
            {{--            label: '# of Tomatoes',--}}
            {{--            data: {!! json_encode($dataDeudaClasificacionCon['monto']) !!},--}}
            {{--            backgroundColor: [--}}
            {{--                'rgba(255, 99, 132, 0.2)',--}}
            {{--                'rgba(54, 162, 235, 0.2)',--}}
            {{--                'rgba(255, 159, 64, 0.2)',--}}
            {{--                'rgba(115, 255, 64, 0.2)',--}}
            {{--                'rgba(153, 102, 255, 0.2)',--}}
            {{--                'rgba(8,173,173,0.2)',--}}
            {{--                'rgba(142,16,115,0.2)',--}}

            {{--                'rgba(255, 206, 86, 0.2)',--}}

            {{--                ,]--}}

            {{--            ,--}}
            {{--            borderColor: [--}}
            {{--                'rgba(255, 99, 132, 1)',--}}
            {{--                'rgba(54, 162, 235, 1)',--}}
            {{--                'rgba(255, 159, 64, 1)',--}}
            {{--                'rgb(42, 177, 66, 1)',--}}
            {{--                'rgba(153, 102, 255, 1)',--}}
            {{--                'rgb(51,198,176)',--}}
            {{--                'rgb(175,39,152)',--}}

            {{--                'rgba(255, 206, 86, 1)',--}}

            {{--            ],--}}
            {{--            borderWidth: 1--}}
            {{--        }]--}}
            {{--    },--}}
            {{--    options: {--}}
            {{--        display: 'auto',--}}
            {{--        //cutoutPercentage: 40,--}}
            {{--        responsive: false,--}}
            {{--        tooltips: {--}}
            {{--            enabled: true,--}}
            {{--        },--}}
            {{--        plugins: {--}}
            {{--            datalabels: {--}}
            {{--                formatter: (value, ctx) => {--}}
            {{--                    let sum = 0;--}}
            {{--                    let dataArr = ctx.chart.data.datasets[0].data;--}}
            {{--                    dataArr.map(data => {--}}
            {{--                        sum += data;--}}
            {{--                    });--}}
            {{--                    let percentage = (value*100 / sum).toFixed(0)+"%";--}}
            {{--                    // if((value*100 / sum)>5) {--}}
            {{--                    return percentage;--}}
            {{--                    // }--}}
            {{--                    // else{--}}
            {{--                    //     return null;--}}
            {{--                    // }--}}

            {{--                },--}}

            {{--                //anchor: 'end',--}}
            {{--                // align: 'end',--}}
            {{--                // offset: 10,--}}
            {{--                display: 'auto',--}}
            {{--                //color: '#000000',--}}
            {{--            },--}}

            {{--        }--}}
            {{--    }--}}
            {{--});--}}

            {{--var ctx = document.getElementById('deudasindespachoclasificacion-chart').getContext('2d');--}}
            {{--var myChart = new Chart(ctx, {--}}
            {{--    plugins: [ChartDataLabels],--}}
            {{--    type: 'doughnut',--}}
            {{--    data: {--}}
            {{--        labels: {!! json_encode($dataDeudaClasificacionSin['clasificacion']) !!},--}}
            {{--        datasets: [{--}}
            {{--            label: '# of Tomatoes',--}}
            {{--            data: {!! json_encode($dataDeudaClasificacionSin['monto']) !!},--}}
            {{--            backgroundColor: [--}}
            {{--                'rgba(255, 99, 132, 0.2)',--}}
            {{--                'rgba(54, 162, 235, 0.2)',--}}
            {{--                'rgba(255, 159, 64, 0.2)',--}}
            {{--                'rgba(115, 255, 64, 0.2)',--}}
            {{--                //'rgba(75, 192, 192, 0.2)',--}}
            {{--                // 'rgba(255, 206, 86, 0.2)',--}}

            {{--                'rgba(153, 102, 255, 0.2)',--}}
            {{--                'rgba(8,173,173,0.2)',--}}
            {{--                'rgba(142,16,115,0.2)',--}}
            {{--            ]--}}

            {{--            ,--}}
            {{--            borderColor: [--}}
            {{--                'rgba(255, 99, 132, 1)',--}}
            {{--                'rgba(54, 162, 235, 1)',--}}
            {{--                'rgba(255, 159, 64, 1)',--}}
            {{--                'rgb(42, 177, 66, 1)',--}}
            {{--                //'rgba(75, 192, 192, 1)',--}}
            {{--                // 'rgba(255, 206, 86, 1)',--}}

            {{--                'rgba(153, 102, 255, 1)',--}}
            {{--                'rgb(51,198,176)',--}}
            {{--                'rgb(175,39,152)',--}}
            {{--            ],--}}
            {{--            borderWidth: 1--}}
            {{--        }]--}}
            {{--    },--}}
            {{--    options: {--}}
            {{--        display: 'auto',--}}
            {{--        //cutoutPercentage: 40,--}}
            {{--        responsive: false,--}}
            {{--        tooltips: {--}}
            {{--            enabled: true,--}}
            {{--        },--}}
            {{--        plugins: {--}}
            {{--            datalabels: {--}}
            {{--                formatter: (value, ctx) => {--}}
            {{--                    let sum = 0;--}}
            {{--                    let dataArr = ctx.chart.data.datasets[0].data;--}}
            {{--                    dataArr.map(data => {--}}
            {{--                        sum += data;--}}
            {{--                    });--}}
            {{--                    let percentage = (value*100 / sum).toFixed(0)+"%";--}}
            {{--                    // if((value*100 / sum)>5) {--}}
            {{--                    return percentage;--}}
            {{--                    // }--}}
            {{--                    // else{--}}
            {{--                    //     return null;--}}
            {{--                    // }--}}

            {{--                },--}}

            {{--                //anchor: 'end',--}}
            {{--                // align: 'end',--}}
            {{--                // offset: 10,--}}
            {{--                display: 'auto',--}}
            {{--                //color: '#000000',--}}
            {{--            },--}}

            {{--        }--}}
            {{--    }--}}
            {{--});--}}


            var ctx = document.getElementById('ingresocobranzadiario-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($dataIngresosCobranzaDiario['fecha']) !!},
                    datasets: [{
                        label: 'Miles de Soles',
                        data:{!! json_encode($dataIngresosCobranzaDiario['monto']) !!},
                        backgroundColor: //[
                            'rgba(115,255,64,0.2)',

                        borderColor: //[
                            'rgb(42, 177, 66, 1)',
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
                            ctx.fillStyle = 'rgb(42,177,66)';//"#666";
                            this.data.datasets.forEach(function(dataset, i) {
                                var meta = chartInstance.controller.getDatasetMeta(i);
                                meta.data.forEach(function(bar, index) {
                                    var data = dataset.data[index];
                                    if(data===0){
                                        ctx.fillText(data, bar._model.x, bar._model.y-5);
                                    }else if(i===0){
                                        ctx.fillText(data, bar._model.x+3, bar._model.y-5);
                                    }
                                });
                            });
                        }
                    },
                }
            });

            function commaSeparateNumber(val) {
                while (/(\d+)(\d{3})/.test(val.toString())) {
                    val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
                }
                return val;
            };

            $("#distribuciondeudavencida").DataTable({
                data:{!! json_encode($dataIndiceMorisidadDetalle00) !!},

                columns: [
                    { data: 'TipoCliente' },
                    { data: 'TipoClienteDescripcion' },
                    { data: 'clasificacion' },
                    { data: 'montopendiente' },
                    { data: 'porcentaje' },

                ],
                columnDefs: [
                    { render: function ( data, type, row ) {
                            return (100 * data).toFixed(2)+'%';
                        },
                        targets: [ 4 ],

                    },
                    { render: function ( data, type, row ) {
                            return commaSeparateNumber((1 * data).toFixed(2));
                        },
                        targets: [ 3 ]

                    },
                    {className: "text-right", targets: [ 3,4 ]}
                ],
                ordering: false,
                searching: false,
                fixedColumns:   true,
                 dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv',
                    'excel',
                    // 'pdf', 'print'
                ],
                order: [[1,'desc']],
                paging: false,
                info: false

            });

            $("#top5clientefinal").DataTable({
                data:{!! json_encode($dataIndiceMorisidadDetalle01) !!},

                columns: [
                    { data: 'ClienteNumero' },
                    { data: 'ClienteNombre' },
                    { data: 'clasificacion' },
                    { data: 'MontoPendiente' },
                    // { data: 'porcentaje' },

                ],
                columnDefs: [
                    // { render: function ( data, type, row ) {
                    //         return (100 * data).toFixed(2)+'%';
                    //     },
                    //     targets: [ 4 ],
                    //
                    // },
                    { render: function ( data, type, row ) {
                            return commaSeparateNumber((1 * data).toFixed(2));
                        },
                        targets: [ 3 ]

                    },
                    {className: "text-right", targets: [ 3 ]}
                ],
                ordering: false,
                searching: false,
                fixedColumns:   true,
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv',
                    'excel',
                    // 'pdf', 'print'
                ],
                order: [[1,'desc']],
                paging: false,
                info: false

            });

            $("#top5ferretero").DataTable({
                data:{!! json_encode($dataIndiceMorisidadDetalle12) !!},

                columns: [
                    { data: 'ClienteNumero' },
                    { data: 'ClienteNombre' },
                    { data: 'clasificacion' },
                    { data: 'MontoPendiente' },
                    // { data: 'porcentaje' },

                ],
                columnDefs: [
                    // { render: function ( data, type, row ) {
                    //         return (100 * data).toFixed(2)+'%';
                    //     },
                    //     targets: [ 4 ],
                    //
                    // },
                    { render: function ( data, type, row ) {
                            return commaSeparateNumber((1 * data).toFixed(2));
                        },
                        targets: [ 3 ]

                    },
                    {className: "text-right", targets: [ 3 ]}
                ],
                ordering: false,
                searching: false,
                fixedColumns:   true,
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv',
                    'excel',
                    // 'pdf', 'print'
                ],
                order: [[1,'desc']],
                paging: false,
                info: false

            });

            $("#top5distribuidor").DataTable({
                data:{!! json_encode($dataIndiceMorisidadDetalle13) !!},

                columns: [
                    { data: 'ClienteNumero' },
                    { data: 'ClienteNombre' },
                    { data: 'clasificacion' },
                    { data: 'MontoPendiente' },
                    // { data: 'porcentaje' },

                ],
                columnDefs: [
                    // { render: function ( data, type, row ) {
                    //         return (100 * data).toFixed(2)+'%';
                    //     },
                    //     targets: [ 4 ],
                    //
                    // },
                    { render: function ( data, type, row ) {
                            return commaSeparateNumber((1 * data).toFixed(2));
                        },
                        targets: [ 3 ]

                    },
                    {className: "text-right", targets: [ 3 ]}
                ],
                ordering: false,
                searching: false,
                fixedColumns:   true,
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv',
                    'excel',
                    // 'pdf', 'print'
                ],
                order: [[1,'desc']],
                paging: false,
                info: false

            });

            $("#top5constructura").DataTable({
                data:{!! json_encode($dataIndiceMorisidadDetalle02) !!},

                columns: [
                    { data: 'ClienteNumero' },
                    { data: 'ClienteNombre' },
                    { data: 'clasificacion' },
                    { data: 'MontoPendiente' },
                    // { data: 'porcentaje' },

                ],
                columnDefs: [
                    // { render: function ( data, type, row ) {
                    //         return (100 * data).toFixed(2)+'%';
                    //     },
                    //     targets: [ 4 ],
                    //
                    // },
                    { render: function ( data, type, row ) {
                            return commaSeparateNumber((1 * data).toFixed(2));
                        },
                        targets: [ 3 ]

                    },
                    {className: "text-right", targets: [ 3 ]}
                ],
                ordering: false,
                searching: false,
                fixedColumns:   true,
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv',
                    'excel',
                    // 'pdf', 'print'
                ],
                order: [[1,'desc']],
                paging: false,
                info: false

            });

            $("#top5megacentro").DataTable({
                data:{!! json_encode($dataIndiceMorisidadDetalle05) !!},

                columns: [
                    { data: 'ClienteNumero' },
                    { data: 'ClienteNombre' },
                    { data: 'clasificacion' },
                    { data: 'MontoPendiente' },
                    // { data: 'porcentaje' },

                ],
                columnDefs: [
                    // { render: function ( data, type, row ) {
                    //         return (100 * data).toFixed(2)+'%';
                    //     },
                    //     targets: [ 4 ],
                    //
                    // },
                    { render: function ( data, type, row ) {
                            return commaSeparateNumber((1 * data).toFixed(2));
                        },
                        targets: [ 3 ]

                    },
                    {className: "text-right", targets: [ 3 ]}
                ],
                ordering: false,
                searching: false,
                fixedColumns:   true,
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv',
                    'excel',
                    // 'pdf', 'print'
                ],
                order: [[1,'desc']],
                paging: false,
                info: false

            });

            $("#top5sectorpublico").DataTable({
                data:{!! json_encode($dataIndiceMorisidadDetalle06) !!},

                columns: [
                    { data: 'ClienteNumero' },
                    { data: 'ClienteNombre' },
                    { data: 'clasificacion' },
                    { data: 'MontoPendiente' },
                    // { data: 'porcentaje' },

                ],
                columnDefs: [
                    // { render: function ( data, type, row ) {
                    //         return (100 * data).toFixed(2)+'%';
                    //     },
                    //     targets: [ 4 ],
                    //
                    // },
                    { render: function ( data, type, row ) {
                            return commaSeparateNumber((1 * data).toFixed(2));
                        },
                        targets: [ 3 ]

                    },
                    {className: "text-right", targets: [ 3 ]}
                ],
                ordering: false,
                searching: false,
                fixedColumns:   true,
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv',
                    'excel',
                    // 'pdf', 'print'
                ],
                order: [[1,'desc']],
                paging: false,
                info: false

            });

        }
    </script>



@endsection
