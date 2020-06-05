@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card ">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Descargas de Horno - Periodo {{$startDate->format('Y-m')}}</h3>
{{--                                <a href="javascript:void(0);">View Report</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Total {{$data['total']}} Millares</span>
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
                                <canvas id="production-chart" height="200"></canvas>
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

                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->

                <div class="col-lg-6">
{{--                    <div class="card-body table-responsive p-0">--}}
{{--                        <table class="table table-striped table-valign-middle">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Fecha</th>--}}
{{--                                <th>Cantidad</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}

{{--                                @foreach($raw as $value)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$value->fecha}}</td>--}}
{{--                                    <td>{{$value->cantidad}}</td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}

{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}

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
            //dd($raw);

            {{--var cantidadArray = <?php echo json_encode($_SESSION["cantidad"]); ?>;--}}
            {{--var fechaArray = <?php echo json_encode($_SESSION["fecha"]); ?>;--}}

            //console.log(tempArray);
            {{--var sites = {!! json_encode($sites->toArray()) !!};--}}
            var canvas = document.getElementById("production-chart");
            var ctx = canvas.getContext('2d');

            Chart.defaults.global.defaultFontColor = 'black';
            Chart.defaults.global.defaultFontSize = 16;

            var data = {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Stock A",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(225,0,0,0.4)",
                    borderColor: "red", // The main line color
                    borderCapStyle: 'square',
                    borderDash: [], // try [5, 15] for instance
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "black",
                    pointBackgroundColor: "white",
                    pointBorderWidth: 1,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: "yellow",
                    pointHoverBorderColor: "brown",
                    pointHoverBorderWidth: 2,
                    pointRadius: 4,
                    pointHitRadius: 10,
                    // notice the gap in the data and the spanGaps: true
                    data: [65, 59, 80, 81, 56, 55, 40, ,60,55,30,78],
                    spanGaps: true,
                }, {
                    label: "Stock B",
                    fill: true,
                    lineTension: 0.1,
                    backgroundColor: "rgba(167,105,0,0.4)",
                    borderColor: "rgb(167, 105, 0)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "white",
                    pointBackgroundColor: "black",
                    pointBorderWidth: 1,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: "brown",
                    pointHoverBorderColor: "yellow",
                    pointHoverBorderWidth: 2,
                    pointRadius: 4,
                    pointHitRadius: 10,
                    // notice the gap in the data and the spanGaps: false
                    data: [10, 20, 60, 95, 64, 78, 90,,70,40,70,89],
                    spanGaps: false,
                }

                ]
            };

// Notice the scaleLabel at the same level as Ticks
            var options = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Moola',
                            fontSize: 20
                        }
                    }]
                }
            };

// Chart declaration:
            var myBarChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: options
            });
        }

        {{--var ctx = document.getElementById('production-chart').getContext('2d');--}}
        {{--var myChart = new Chart(ctx, {--}}
        {{--    type: 'line',--}}
        {{--    data: {--}}
        {{--        //labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],--}}
        {{--        labels: {!! json_encode($data['fecha']) !!},--}}
        {{--        datasets: [{--}}
        {{--            label: 'Millares',--}}
        {{--            data:{!! json_encode($data['cantidad']) !!},--}}
        {{--            //data:[{"x":"01","y":"126.4650"},{"x":"02","y":"146.4650"}],--}}

        {{--            // data: cantidadArray,--}}
        {{--            //data: $total,--}}
        //             backgroundColor: [
        //             'rgba(255, 99, 132, 0.2)'
        //                 'rgba(54, 162, 235, 0.2)'
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)',]
        //
        //             ,
        //             borderColor: [
        //                 'rgba(255, 99, 132, 1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)',]
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
        {{--                //stacked: true,--}}
        {{--                // ticks: {--}}
        {{--                //     beginAtZero: true--}}
        {{--                // }--}}
        {{--            }]--}}
        {{--        },--}}

        {{--        "animation": {--}}
        {{--            "duration": 1,--}}
        {{--            "onComplete": function() {--}}
        {{--                var chartInstance = this.chart,--}}
        {{--                    ctx = chartInstance.ctx;--}}

        {{--                //ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);--}}

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
    </script>

@endsection
