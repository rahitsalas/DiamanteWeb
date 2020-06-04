@extends('layouts.Dashboard.template')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="m-0 text-dark">Producción</h2>
                </div>
            </div>

            <div class="row">
                @if(Auth::user()->id==1)
                    <div class="col-md-9">
                @else
                    <div class="col-md-12">
                @endif

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
                    </div>
                @if(Auth::user()->id==1)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">{{$startDate->format('Y-m')}}</h3>
                                </div>
                            </div>
                            <div class="card-body pt-0 mt-0">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">Comparativo Anual</span>
                                </div>
                                <!-- /.d-flex -->

                                <div class="position-relative mb-4">
                                    <canvas id="descargahornototal-chart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                @endif
            </div>

            <div class="row">
                @if(Auth::user()->id==1)
                    <div class="col-md-9">
                @else
                    <div class="col-md-12">
                @endif
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
                    </div>

                @if(Auth::user()->id==1)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">{{$startDate->format('Y-m')}}</h3>
                                </div>
                            </div>
                            <div class="card-body pt-0 mt-0">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">Comparativo Anual</span>
                                </div>
                                <!-- /.d-flex -->

                                <div class="position-relative mb-4">
                                    <canvas id="produccionnetaplantatotal-chart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Ratio Gas  {{$startDate->format('Y-m')}}</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
{{--                            <div class="d-flex">--}}
{{--                                <p class="d-flex flex-column">--}}
{{--                                    <span class="text-bold text-lg">Total {{$dataProduccionNetaPlanta['total']}} Millares</span>--}}
{{--                                    <span></span>--}}
{{--                                </p>--}}
{{--                            </div>--}}
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="ratiogas-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <!-- /.col-md-6 -->
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="m-0 text-dark">Comercial</h2>
                </div>
            </div>

            <div class="row">
                @if(Auth::user()->id==1)
                    <div class="col-md-9">
                        @else
                            <div class="col-md-12">
                                @endif

                                <div class="card ">
                                    <div class="card-header border-0">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title">Venta Diaria  {{$startDate->format('Y-m')}}</h3>
                                            {{--                                <a href="javascript:void(0);">View Report</a>--}}
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 mt-0">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span class="text-bold text-lg">Total {{$dataDespachoDiaroMillar['total']}} Millares</span>
                                                <span></span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->

                                        <div class="position-relative mb-4">
                                            <canvas id="despachodiariomillar-chart" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                            @if(Auth::user()->id==1)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="card-title">{{$startDate->format('Y-m')}}</h3>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 mt-0">
                                            <div class="d-flex">
                                                <p class="d-flex flex-column">
                                                    <span class="text-bold text-lg">Comparativo Anual</span>
                                            </div>
                                            <!-- /.d-flex -->

                                            <div class="position-relative mb-4">
                                                <canvas id="despachodiariomillartotal-chart" height="200"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                            @endif
                    </div>

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
                        borderWidth: 1.5,
                        pointBackgroundColor: 'rgba(255, 159, 64, 1)',
                        fill: false
                    },
                        {
                            label: 'Ratio Con Secadero',
                            data:{!! json_encode($dataRatioGasConSecadero['ratio']) !!},
                            backgroundColor: //[
                                'rgba(54, 162, 235, 0.2)',

                            borderColor: //[
                                'rgba(54, 162, 235, 1)',
                            borderWidth: 1.5,
                            pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                            fill: false
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
                            ctx.textBaseline = 'top';
                            ctx.fillStyle = "#666";
                            // console.log(this.data);
                            this.data.datasets.forEach(function(dataset, i) {
                                var meta = chartInstance.controller.getDatasetMeta(i);
                                console.log(meta);
                                meta.data.forEach(function(bar, index) {
                                    var data = dataset.data[index];
                                    if(data===0){
                                        ctx.fillText(data, bar._model.x, bar._model.y-20);
                                    }else if(i===0){
                                        ctx.fillText(data, bar._model.x+10, bar._model.y+20);
                                    }else{
                                        ctx.fillText(data, bar._model.x+10, bar._model.y-20);
                                    }


                                });
                            //
                            // this.data[1].forEach(function(dataset, i) {
                            //     var meta = chartInstance.controller.getDatasetMeta(i);
                            //     console.log(meta);
                            //     meta.data.forEach(function(bar, index) {
                            //         var data = dataset.data[index];
                            //
                            //         ctx.fillText(data, bar._model.x, bar._model.y +5);
                            //
                            //     });

                            });
                        }
                    },
                }
            });

            var ctx = document.getElementById('despachodiariomillar-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($dataDespachoDiaroMillar['fecha']) !!},
                    datasets: [{
                        label: 'Millares',
                        data:{!! json_encode($dataDespachoDiaroMillar['cantidad']) !!},
                        backgroundColor: //[
                            'rgba(255, 159, 64, 0.2)',

                        borderColor: //[
                            'rgba(255, 159, 64, 1)',
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
                            ctx.fillStyle = 'rgba(255, 159, 64, 1)';//"#666";
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

            // Graficos Comparativos Privados

            var ctx = document.getElementById('descargahornototal-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['{{$startDate->format('Y-m')}}'],
                    datasets: [{
                        label: '{{$startDate->format('Y-m')}}',
                        data: [{{$dataDescargaHorno['total']}}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            ]
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

            var ctx = document.getElementById('produccionnetaplantatotal-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['{{$startDate->format('Y-m')}}'],
                    datasets: [{
                        label: '{{$startDate->format('Y-m')}}',
                        data: [{{$dataProduccionNetaPlanta['total']}}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                        ]
                        ,
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

            var ctx = document.getElementById('despachodiariomillartotal-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['{{$startDate->format('Y-m')}}'],
                    datasets: [{
                        label: '{{$startDate->format('Y-m')}}',
                        data: [{{$dataDespachoDiaroMillar['total']}}],
                        backgroundColor: [
                            'rgba(255, 159, 64, 0.2)',
                        ]
                        ,
                        borderColor: //[
                            'rgba(255, 159, 64, 1)',
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
                            ctx.fillStyle = 'rgba(255, 159, 64, 1)';//"#666";
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
