@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Descargas de Horno  {{$startDate->format('Y-m')}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataDescargaHorno['total']}} Millares</span>
                                    <span></span>
                                </p>
                                {{--                                <p class="ml-auto d-flex flex-column text-right">--}}
                                {{--                                    <span class="text-success">--}}
                                {{--                                      <i class="fas fa-arrow-up"></i> 12.5%--}}
                                {{--                                    </span>--}}
                                {{--                                    <span class="text-muted">Since last week</span>--}}
                                {{--                                </p>--}}
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="descargahorno-chart" height="200"></canvas>
                            </div>

                            {{--                            <div class="d-flex flex-row justify-content-end">--}}
                            {{--                  <span class="mr-2">--}}
                            {{--                    <i class="fas fa-square text-primary"></i> This Week--}}
                            {{--                  </span>--}}

                            {{--                                <span>--}}
                            {{--                    <i class="fas fa-square text-gray"></i> Last Week--}}
                            {{--                  </span>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>


                    <!-- /.card -->

                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Producción Neta de Planta  {{$startDate->format('Y-m')}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataProduccionNetaPlanta['total']}} Millares</span>
                                    <span></span>
                                </p>
                                {{--                                <p class="ml-auto d-flex flex-column text-right">--}}
                                {{--                                    <span class="text-success">--}}
                                {{--                                      <i class="fas fa-arrow-up"></i> 12.5%--}}
                                {{--                                    </span>--}}
                                {{--                                    <span class="text-muted">Since last week</span>--}}
                                {{--                                </p>--}}
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="produccionnetaplanta-chart" height="200"></canvas>
                            </div>

                            {{--                            <div class="d-flex flex-row justify-content-end">--}}
                            {{--                  <span class="mr-2">--}}
                            {{--                    <i class="fas fa-square text-primary"></i> This Week--}}
                            {{--                  </span>--}}

                            {{--                                <span>--}}
                            {{--                    <i class="fas fa-square text-gray"></i> Last Week--}}
                            {{--                  </span>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
{{--                <div class="col-lg-6">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header border-0">--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <h3 class="card-title">Sales</h3>--}}
{{--                                <a href="javascript:void(0);">View Report</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex">--}}
{{--                                <p class="d-flex flex-column">--}}
{{--                                    <span class="text-bold text-lg">$18,230.00</span>--}}
{{--                                    <span>Sales Over Time</span>--}}
{{--                                </p>--}}
{{--                                <p class="ml-auto d-flex flex-column text-right">--}}
{{--                    <span class="text-success">--}}
{{--                      <i class="fas fa-arrow-up"></i> 33.1%--}}
{{--                    </span>--}}
{{--                                    <span class="text-muted">Since last month</span>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <!-- /.d-flex -->--}}

{{--                            <div class="position-relative mb-4">--}}
{{--                                <canvas id="sales-chart" height="200"></canvas>--}}
{{--                            </div>--}}

{{--                            <div class="d-flex flex-row justify-content-end">--}}
{{--                  <span class="mr-2">--}}
{{--                    <i class="fas fa-square text-primary"></i> This year--}}
{{--                  </span>--}}

{{--                                <span>--}}
{{--                    <i class="fas fa-square text-gray"></i> Last year--}}
{{--                  </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /.card -->--}}

{{--                    <div class="card">--}}
{{--                        <div class="card-header border-0">--}}
{{--                            <h3 class="card-title">Online Store Overview</h3>--}}
{{--                            <div class="card-tools">--}}
{{--                                <a href="#" class="btn btn-sm btn-tool">--}}
{{--                                    <i class="fas fa-download"></i>--}}
{{--                                </a>--}}
{{--                                <a href="#" class="btn btn-sm btn-tool">--}}
{{--                                    <i class="fas fa-bars"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">--}}
{{--                                <p class="text-success text-xl">--}}
{{--                                    <i class="ion ion-ios-refresh-empty"></i>--}}
{{--                                </p>--}}
{{--                                <p class="d-flex flex-column text-right">--}}
{{--                    <span class="font-weight-bold">--}}
{{--                      <i class="ion ion-android-arrow-up text-success"></i> 12%--}}
{{--                    </span>--}}
{{--                                    <span class="text-muted">CONVERSION RATE</span>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <!-- /.d-flex -->--}}
{{--                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">--}}
{{--                                <p class="text-warning text-xl">--}}
{{--                                    <i class="ion ion-ios-cart-outline"></i>--}}
{{--                                </p>--}}
{{--                                <p class="d-flex flex-column text-right">--}}
{{--                    <span class="font-weight-bold">--}}
{{--                      <i class="ion ion-android-arrow-up text-warning"></i> 0.8%--}}
{{--                    </span>--}}
{{--                                    <span class="text-muted">SALES RATE</span>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <!-- /.d-flex -->--}}
{{--                            <div class="d-flex justify-content-between align-items-center mb-0">--}}
{{--                                <p class="text-danger text-xl">--}}
{{--                                    <i class="ion ion-ios-people-outline"></i>--}}
{{--                                </p>--}}
{{--                                <p class="d-flex flex-column text-right">--}}
{{--                    <span class="font-weight-bold">--}}
{{--                      <i class="ion ion-android-arrow-down text-danger"></i> 1%--}}
{{--                    </span>--}}
{{--                                    <span class="text-muted">REGISTRATION RATE</span>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <!-- /.d-flex -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /.col-md-6 -->--}}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
        window.onload = function() {
            var ctx = document.getElementById('descargahorno-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($dataDescargaHorno['fecha']) !!},
                    datasets: [{
                        label: 'Millares',
                        data:{!! json_encode($dataDescargaHorno['cantidad']) !!},
                        backgroundColor: //[
                            'rgba(54, 162, 235, 0.2)'
                        ,
                        borderColor: //[
                            'rgba(54, 162, 235, 1)',
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
                            ctx.fillStyle = 'rgba(54, 162, 235, 1)';//"#666";
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

            var ctx = document.getElementById('produccionnetaplanta-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($dataProduccionNetaPlanta['fecha']) !!},
                    datasets: [{
                        label: 'Millares',
                        data:{!! json_encode($dataProduccionNetaPlanta['cantidad']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgba(255, 99, 132, 1)',
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
                            ctx.fillStyle = 'rgba(255, 99, 132, 1)';//"#666";
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



        }


    </script>
@endsection
