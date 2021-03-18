@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Rotacion de Personal</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">General</h3>
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
                                *Empleados y Obreros
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
                                <h3 class="card-title">Obrero</h3>
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
                                <h3 class="card-title">Empleado</h3>
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

            <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Indice de Ausentismo</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">General</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="position-relative">
                                <canvas id="ausentismogeneral-chart" height="200"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *Empleados y Obreros
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
                                <h3 class="card-title">Obrero</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="position-relative">
                                <canvas id="ausentismoobrero-chart" height="200"></canvas>
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
                                <h3 class="card-title">Empleado</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="position-relative">
                                <canvas id="ausentismoempleado-chart" height="200"></canvas>
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

            <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Indice de Descanso Medico/Subsidio</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">General</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="position-relative">
                                <canvas id="descansomedicogeneral-chart" height="200"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *Empleados y Obreros
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
                                <h3 class="card-title">Obrero</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="position-relative">
                                <canvas id="descansomedicoobrero-chart" height="200"></canvas>
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
                                <h3 class="card-title">Empleado</h3>
                                {{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 mb-0 pb-0">
                            <div class="position-relative">
                                <canvas id="descansomedicoempleado-chart" height="200"></canvas>
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
                type: 'bar',
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
                        // fill: false,
                    },
                        {
                            label: {!! json_encode($dataIndiceRotacionPersonalObreroPasado['año']) !!},
                            data:{!! json_encode($dataIndiceRotacionPersonalObreroPasado['indice']) !!},
                            backgroundColor: //[
                                'rgba(115,255,64,0.2)',

                            borderColor: //[
                                'rgb(42, 177, 66, 1)',
                            borderWidth: 1,
                            // fill: false,
                        },
                        {
                            label: {!! json_encode($dataIndiceRotacionPersonalObreroActual['año']) !!},
                            data:{!! json_encode($dataIndiceRotacionPersonalObreroActual['indice']) !!},
                            backgroundColor: //[
                                'rgba(54, 162, 235, 0.2)',

                            borderColor: //[
                                'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            // fill: false,
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


            var ctx = document.getElementById('ausentismogeneral-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceAusentismoGeneralPasado2['mes']) !!},

                    datasets: [{
                        label: {!! json_encode($dataIndiceAusentismoGeneralPasado2['año']) !!},
                        data:{!! json_encode($dataIndiceAusentismoGeneralPasado2['indice']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                        {
                            label: {!! json_encode($dataIndiceAusentismoGeneralPasado['año']) !!},
                            data:{!! json_encode($dataIndiceAusentismoGeneralPasado['indice']) !!},
                            backgroundColor: //[
                                'rgba(115,255,64,0.2)',

                            borderColor: //[
                                'rgb(42, 177, 66, 1)',
                            borderWidth: 1
                        },
                        {
                            label: {!! json_encode($dataIndiceAusentismoGeneralActual['año']) !!},
                            data:{!! json_encode($dataIndiceAusentismoGeneralActual['indice']) !!},
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

            var ctx = document.getElementById('ausentismoobrero-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceAusentismoObreroPasado2['mes']) !!},

                    datasets: [{
                        label: {!! json_encode($dataIndiceAusentismoObreroPasado2['año']) !!},
                        data:{!! json_encode($dataIndiceAusentismoObreroPasado2['indice']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        // fill: false,
                    },
                        {
                            label: {!! json_encode($dataIndiceAusentismoObreroPasado['año']) !!},
                            data:{!! json_encode($dataIndiceAusentismoObreroPasado['indice']) !!},
                            backgroundColor: //[
                                'rgba(115,255,64,0.2)',

                            borderColor: //[
                                'rgb(42, 177, 66, 1)',
                            borderWidth: 1,
                            // fill: false,
                        },
                        {
                            label: {!! json_encode($dataIndiceAusentismoObreroActual['año']) !!},
                            data:{!! json_encode($dataIndiceAusentismoObreroActual['indice']) !!},
                            backgroundColor: //[
                                'rgba(54, 162, 235, 0.2)',

                            borderColor: //[
                                'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            // fill: false,
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

            var ctx = document.getElementById('ausentismoempleado-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceAusentismoEmpleadoPasado2['mes']) !!},

                    datasets: [{
                        label: {!! json_encode($dataIndiceAusentismoEmpleadoPasado2['año']) !!},
                        data:{!! json_encode($dataIndiceAusentismoEmpleadoPasado2['indice']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                        {
                            label: {!! json_encode($dataIndiceAusentismoEmpleadoPasado['año']) !!},
                            data:{!! json_encode($dataIndiceAusentismoEmpleadoPasado['indice']) !!},
                            backgroundColor: //[
                                'rgba(115,255,64,0.2)',

                            borderColor: //[
                                'rgb(42, 177, 66, 1)',
                            borderWidth: 1
                        },
                        {
                            label: {!! json_encode($dataIndiceAusentismoEmpleadoActual['año']) !!},
                            data:{!! json_encode($dataIndiceAusentismoEmpleadoActual['indice']) !!},
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


            var ctx = document.getElementById('descansomedicogeneral-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceDescansoMedicoGeneralPasado2['mes']) !!},

                    datasets: [{
                        label: {!! json_encode($dataIndiceDescansoMedicoGeneralPasado2['año']) !!},
                        data:{!! json_encode($dataIndiceDescansoMedicoGeneralPasado2['indice']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                        {
                            label: {!! json_encode($dataIndiceDescansoMedicoGeneralPasado['año']) !!},
                            data:{!! json_encode($dataIndiceDescansoMedicoGeneralPasado['indice']) !!},
                            backgroundColor: //[
                                'rgba(115,255,64,0.2)',

                            borderColor: //[
                                'rgb(42, 177, 66, 1)',
                            borderWidth: 1
                        },
                        {
                            label: {!! json_encode($dataIndiceDescansoMedicoGeneralActual['año']) !!},
                            data:{!! json_encode($dataIndiceDescansoMedicoGeneralActual['indice']) !!},
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

            var ctx = document.getElementById('descansomedicoobrero-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceDescansoMedicoObreroPasado2['mes']) !!},

                    datasets: [{
                        label: {!! json_encode($dataIndiceDescansoMedicoObreroPasado2['año']) !!},
                        data:{!! json_encode($dataIndiceDescansoMedicoObreroPasado2['indice']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        // fill: false,
                    },
                        {
                            label: {!! json_encode($dataIndiceDescansoMedicoObreroPasado['año']) !!},
                            data:{!! json_encode($dataIndiceDescansoMedicoObreroPasado['indice']) !!},
                            backgroundColor: //[
                                'rgba(115,255,64,0.2)',

                            borderColor: //[
                                'rgb(42, 177, 66, 1)',
                            borderWidth: 1,
                            // fill: false,
                        },
                        {
                            label: {!! json_encode($dataIndiceDescansoMedicoObreroActual['año']) !!},
                            data:{!! json_encode($dataIndiceDescansoMedicoObreroActual['indice']) !!},
                            backgroundColor: //[
                                'rgba(54, 162, 235, 0.2)',

                            borderColor: //[
                                'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            // fill: false,
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

            var ctx = document.getElementById('descansomedicoempleado-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataIndiceDescansoMedicoEmpleadoPasado2['mes']) !!},

                    datasets: [{
                        label: {!! json_encode($dataIndiceDescansoMedicoEmpleadoPasado2['año']) !!},
                        data:{!! json_encode($dataIndiceDescansoMedicoEmpleadoPasado2['indice']) !!},
                        backgroundColor: //[
                            'rgba(255, 99, 132, 0.2)',

                        borderColor: //[
                            'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                        {
                            label: {!! json_encode($dataIndiceDescansoMedicoEmpleadoPasado['año']) !!},
                            data:{!! json_encode($dataIndiceDescansoMedicoEmpleadoPasado['indice']) !!},
                            backgroundColor: //[
                                'rgba(115,255,64,0.2)',

                            borderColor: //[
                                'rgb(42, 177, 66, 1)',
                            borderWidth: 1
                        },
                        {
                            label: {!! json_encode($dataIndiceDescansoMedicoEmpleadoActual['año']) !!},
                            data:{!! json_encode($dataIndiceDescansoMedicoEmpleadoActual['indice']) !!},
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
