@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
           <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Descuentos</h2>
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
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Descuentos {{$startDate->format('Y')}} S/ K</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0 pb-0 mb-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$dataDescuentoMensual01['total']}} Miles de Soles</span>
                                    <span></span>
                                </p>
                            </div>
                            <div class="position-relative pt-0 mt-0 pb-0 mb-0">
                                <canvas id="descuentomensual-chart" height="400"></canvas>
                            </div>
                        </div>
                        <div class="card-footer pt-0 mt-0 bg-white">
                            <span class="users-list-date mb-0">
                                *No incluye IGV
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


            var ctx = document.getElementById('descuentomensual-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                plugins: [ChartDataLabels],
                type: 'bar',
                data: {
                    labels: {!! json_encode($dataDescuentoMensual01['mesdescripcion']) !!},

                    datasets: [
                        {
                            label: {!! json_encode($dataDescuentoMensual12['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual12['montodesc']) !!},
                            backgroundColor: //[
                                'rgba(115, 255, 64, 0.2)',

                            borderColor: //[
                                'rgb(42, 177, 66, 1)',

                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual01['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual01['montodesc']) !!},
                            backgroundColor: //[
                                'rgba(54, 162, 235, 0.2)',

                            borderColor: //[
                                'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                             stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual02['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual02['montodesc']) !!},

                            backgroundColor: //[
                                'rgba(255, 99, 132, 0.2)',

                            borderColor: //[
                                'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual13['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual13 ['montodesc']) !!},
                            backgroundColor: //[
                                'rgba(255, 159, 64, 0.2)',

                            borderColor: //[
                                'rgba(255, 159, 64, 1)',

                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual05['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual05['montodesc']) !!},
                            backgroundColor: //[
                                'rgba(153, 102, 255, 0.2)',

                            borderColor: //[
                                'rgba(153, 102, 255, 1)',

                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual06['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual06['montodesc']) !!},

                            backgroundColor: //[
                                'rgba(8,173,173,0.2)',

                            borderColor: //[
                                'rgb(51,198,176)',
                            borderWidth: 1,
                            stack: 'Mes'
                        },

                        {
                            label: {!! json_encode($dataDescuentoMensual07['descripcion']) !!},
                            data:{!! json_encode($dataDescuentoMensual07['montodesc']) !!},
                            backgroundColor: //[
                                'rgba(142,16,115,0.2)',

                            borderColor: //[
                                'rgb(175,39,152)',

                            borderWidth: 1,
                            stack: 'Mes'
                        },


                    ]
                },
                options: {
                    tooltips: {
                        // enabled: true,
                        mode: 'label',
                        callbacks: {
                            label: function (tooltipItem, data) {
                                var corporation = data.datasets[tooltipItem.datasetIndex].label;
                                var valor = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                var total = 0;
                                for (var i = 0; i < data.datasets.length; i++)
                                    total += data.datasets[i].data[tooltipItem.index];
                                if (tooltipItem.datasetIndex != data.datasets.length - 1) {
                                    return corporation + " : " + valor.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, ' ');
                                } else {
                                    return [corporation + " : " + valor.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, ' '), "TOTAL : S/ " + Math.round((total + Number.EPSILON) * 100) / 100];
                                }
                            },
                            // labelColor:  'rgba(255, 159, 64, 1)',
                            labelColor: function(tooltipItem, data) {
                                var dataset = data.config.data.datasets[tooltipItem.datasetIndex];
                                // if (tooltipItem.datasetIndex !== data.datasets.length - 1) {
                                //     return {
                                //         borderColor: dataset.borderColor,
                                //         backgroundColor: dataset.backgroundColor
                                //     }
                                // } else {
                                //     return {
                                //         borderColor: dataset.borderColor,
                                //         backgroundColor: dataset.backgroundColor
                                //     }
                                // }
                                return {
                                    borderColor: dataset.borderColor,
                                    backgroundColor: dataset.backgroundColor
                                }
                                // return {
                                //     borderColor: 'rgb(255, 0, 0)',
                                //     backgroundColor: 'rgb(255, 0, 0)'
                                // };

                            },
                        }
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                             stacked: true
                        }],
                        yAxes: [{
                            display: true,
                            stacked: true
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        datalabels: {
                            formatter: function(value, index, values) {
                                if(value !=0 ){
                                    return value;
                                }else{
                                    value = "";
                                    return value;
                                }
                            },
                            display: 'auto',
                            //color: '#000000',
                        },
                    }
                }
            });

        }
    </script>



@endsection
