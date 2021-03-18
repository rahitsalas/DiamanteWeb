@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">RRHH</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Rotación de Personal General</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="position-relative">
                                <canvas id="rotaciongeneral-chart" height="200"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *Administrativos y Obreros
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
                                <h3 class="card-title">Rotación de Personal Obrero</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="position-relative">
                                <canvas id="rotacionobrero-chart" height="200"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
{{--                            <span class="users-list-date mb-0">--}}
{{--                                *Administrativos y Obreros--}}
{{--                            </span>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Rotación de Personal Administrativo</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="position-relative">
                                <canvas id="rotacionempleado-chart" height="200"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
{{--                            <span class="users-list-date mb-0">--}}
{{--                                *Administrativos y Obreros--}}
{{--                            </span>--}}
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


            var ctx = document.getElementById('rotaciongeneral-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceRotacionPersonalGeneralPasado2['mes']) !!},

                    datasets: [{
                        label: {!! json_encode($dataIndiceRotacionPersonalGeneralPasado2['año']) !!},
                        data:{!! json_encode($dataIndiceRotacionPersonalGeneralPasado2['indice']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: {!! json_encode($dataIndiceRotacionPersonalGeneralPasado['año']) !!},
                        data:{!! json_encode($dataIndiceRotacionPersonalGeneralPasado['indice']) !!},
                        backgroundColor: //[
                            'rgba(115,255,64,0.2)',

                        borderColor: //[
                            'rgb(42, 177, 66, 1)',
                        borderWidth: 1
                    },
                    {
                        label: {!! json_encode($dataIndiceRotacionPersonalGeneralActual['año']) !!},
                        data:{!! json_encode($dataIndiceRotacionPersonalGeneralActual['indice']) !!},
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
                }
            });

            var ctx = document.getElementById('rotacionobrero-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'line',
                data: {
                    labels: {!! json_encode($dataIndiceRotacionPersonalObreroPasado2['mes']) !!},

                    datasets: [{
                        label: {!! json_encode($dataIndiceRotacionPersonalObreroPasado2['año']) !!},
                        data:{!! json_encode($dataIndiceRotacionPersonalObreroPasado2['indice']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        fill: false,
                    },
                        {
                            label: {!! json_encode($dataIndiceRotacionPersonalObreroPasado['año']) !!},
                            data:{!! json_encode($dataIndiceRotacionPersonalObreroPasado['indice']) !!},
                            backgroundColor: //[
                                'rgba(115,255,64,0.2)',

                            borderColor: //[
                                'rgb(42, 177, 66, 1)',
                            borderWidth: 1,
                            fill: false,
                        },
                        {
                            label: {!! json_encode($dataIndiceRotacionPersonalObreroActual['año']) !!},
                            data:{!! json_encode($dataIndiceRotacionPersonalObreroActual['indice']) !!},
                            backgroundColor: //[
                                'rgba(54, 162, 235, 0.2)',

                            borderColor: //[
                                'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            fill: false,
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

            var ctx = document.getElementById('rotacionempleado-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceRotacionPersonalEmpleadoPasado2['mes']) !!},

                    datasets: [{
                        label: {!! json_encode($dataIndiceRotacionPersonalEmpleadoPasado2['año']) !!},
                        data:{!! json_encode($dataIndiceRotacionPersonalEmpleadoPasado2['indice']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                        {
                            label: {!! json_encode($dataIndiceRotacionPersonalEmpleadoPasado['año']) !!},
                            data:{!! json_encode($dataIndiceRotacionPersonalEmpleadoPasado['indice']) !!},
                            backgroundColor: //[
                                'rgba(115,255,64,0.2)',

                            borderColor: //[
                                'rgb(42, 177, 66, 1)',
                            borderWidth: 1
                        },
                        {
                            label: {!! json_encode($dataIndiceRotacionPersonalEmpleadoActual['año']) !!},
                            data:{!! json_encode($dataIndiceRotacionPersonalEmpleadoActual['indice']) !!},
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
                }
            });

        }
    </script>



@endsection
