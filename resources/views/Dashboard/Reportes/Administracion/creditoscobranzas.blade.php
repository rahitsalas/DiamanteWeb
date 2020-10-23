@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
           <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Cuentas por Cobrar</h2>
                </div>
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
                                max: 25,
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
                                max: 500,
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
                                max: 30,
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
                                max: 100,
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
                                max: 16,
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
