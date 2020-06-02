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
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="descargahorno-chart" height="200"></canvas>
                            </div>
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
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="produccionnetaplanta-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->

                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Ratio Gas  {{$startDate->format('Y-m')}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataProduccionNetaPlanta['total']}} Millares</span>
                                    <span></span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="ratiogas-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 -->
{{--                <div class="col-md-3">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header border-0">--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <h3 class="card-title">{{$startDate->format('Y-m')}}</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body pt-0 mt-0">--}}
{{--                            <div class="d-flex">--}}
{{--                                <p class="d-flex flex-column">--}}
{{--                                    <span class="text-bold text-lg">Comparativo Anual</span>--}}
{{--                            </div>--}}
{{--                            <!-- /.d-flex -->--}}

{{--                            <div class="position-relative mb-4">--}}
{{--                                <canvas id="descargahornototal-chart" height="200"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /.card -->--}}

{{--                    <div class="card">--}}
{{--                        <div class="card-header border-0">--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <h3 class="card-title">{{$startDate->format('Y-m')}}</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body pt-0 mt-0">--}}
{{--                            <div class="d-flex">--}}
{{--                                <p class="d-flex flex-column">--}}
{{--                                    <span class="text-bold text-lg">Comparativo Anual</span>--}}
{{--                            </div>--}}
{{--                            <!-- /.d-flex -->--}}

{{--                            <div class="position-relative mb-4">--}}
{{--                                <canvas id="produccionnetaplantatotal-chart" height="200"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- /.col-md-6 -->
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


            var ctx = document.getElementById("ratiogas-chart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($dataRatioGasSinSecadero['fecha']) !!},
                    datasets: [{
                        label: 'Ratio Sin Secadero',
                        data:{!! json_encode($dataRatioGasSinSecadero['ratio']) !!},
                        backgroundColor: //[
                            'rgba(255, 159, 64, 0.2)',

                        borderColor: //[
                            'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    },
                        {
                            label: 'Ratio Con Secadero',
                            data:{!! json_encode($dataRatioGasConSecadero['ratio']) !!},
                            backgroundColor: //[
                                'rgba(54, 162, 235, 0.2)',

                            borderColor: //[
                                'rgba(54, 162, 235, 1)',
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
                    "animation": {
                        "duration": 1,
                        "onComplete": function() {
                            var chartInstance = this.chart,
                                ctx = chartInstance.ctx;
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';
                            ctx.fillStyle = "#666";
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


            {{--var ctx = document.getElementById('descargahornototal-chart').getContext('2d');--}}
            {{--var myChart = new Chart(ctx, {--}}
            {{--    type: 'bar',--}}
            {{--    data: {--}}
            {{--        labels: ['{{$startDate->format('Y-m')}}'],--}}
            {{--        datasets: [{--}}
            {{--            label: '{{$startDate->format('Y-m')}}',--}}
            {{--            data: [{{$dataDescargaHorno['total']}}],--}}
            {{--            backgroundColor: [--}}
            {{--                'rgba(54, 162, 235, 0.2)',--}}
            {{--                ]--}}
            {{--            ,--}}
            {{--            borderColor: //[--}}
            {{--                'rgba(54, 162, 235, 1)',--}}
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
            {{--        "animation": {--}}
            {{--            "duration": 1,--}}
            {{--            "onComplete": function() {--}}
            {{--                var chartInstance = this.chart,--}}
            {{--                    ctx = chartInstance.ctx;--}}
            {{--                ctx.textAlign = 'center';--}}
            {{--                ctx.textBaseline = 'bottom';--}}
            {{--                ctx.fillStyle = 'rgba(54, 162, 235, 1)';//"#666";--}}
            {{--                this.data.datasets.forEach(function(dataset, i) {--}}
            {{--                    var meta = chartInstance.controller.getDatasetMeta(i);--}}
            {{--                    meta.data.forEach(function(bar, index) {--}}
            {{--                        var data = dataset.data[index];--}}
            {{--                        ctx.fillText(data, bar._model.x, bar._model.y - 5);--}}
            {{--                    });--}}
            {{--                });--}}
            {{--            }--}}
            {{--        },--}}
            {{--    }--}}
            {{--});--}}

            {{--var ctx = document.getElementById('produccionnetaplantatotal-chart').getContext('2d');--}}
            {{--var myChart = new Chart(ctx, {--}}
            {{--    type: 'bar',--}}
            {{--    data: {--}}
            {{--        labels: ['{{$startDate->format('Y-m')}}'],--}}
            {{--        datasets: [{--}}
            {{--            label: '{{$startDate->format('Y-m')}}',--}}
            {{--            data: [{{$dataProduccionNetaPlanta['total']}}],--}}
            {{--            backgroundColor: [--}}
            {{--                'rgba(255, 99, 132, 0.2)',--}}
            {{--            ]--}}
            {{--            ,--}}
            {{--            borderColor: //[--}}
            {{--                'rgba(255, 99, 132, 1)',--}}
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
            {{--        "animation": {--}}
            {{--            "duration": 1,--}}
            {{--            "onComplete": function() {--}}
            {{--                var chartInstance = this.chart,--}}
            {{--                    ctx = chartInstance.ctx;--}}
            {{--                ctx.textAlign = 'center';--}}
            {{--                ctx.textBaseline = 'bottom';--}}
            {{--                ctx.fillStyle = 'rgba(255, 99, 132, 1)';//"#666";--}}
            {{--                this.data.datasets.forEach(function(dataset, i) {--}}
            {{--                    var meta = chartInstance.controller.getDatasetMeta(i);--}}
            {{--                    meta.data.forEach(function(bar, index) {--}}
            {{--                        var data = dataset.data[index];--}}
            {{--                        ctx.fillText(data, bar._model.x, bar._model.y - 5);--}}
            {{--                    });--}}
            {{--                });--}}
            {{--            }--}}
            {{--        },--}}
            {{--    }--}}
            {{--});--}}



        }


    </script>
@endsection
