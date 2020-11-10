@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Finanzas</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Posición de Caja Diario</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="position-relative">
                                <canvas id="saldocajadiario-chart" height="200"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *Solo se consideran Cuentas Bancarias
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


            var ctx = document.getElementById('saldocajadiario-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($dataSaldoCajaDiario['fecha']) !!},
                    datasets: [{
                        label: 'Millones de Soles',
                        data:{!! json_encode($dataSaldoCajaDiario['monto']) !!},
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
                                        ctx.fillText(data, bar._model.x-5, bar._model.y-5);
                                    }else if(i===0){
                                        ctx.fillText(data, bar._model.x, bar._model.y-5);
                                    }
                                });
                            });
                        }
                    },
                }
            });

        }
    </script>



@endsection
