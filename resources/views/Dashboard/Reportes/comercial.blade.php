@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
           <div class="row mt-2 mb-2">
                <div class="col-sm-6 mb-0">
                    <h2 class="m-0 text-dark">Comercial</h2>
                </div>
                <div class="col-sm-6 mb-0">
{{--                    <form method="POST" action="{{ route('comercialprocesar') }}">--}}
{{--                        <div class="row">--}}
{{--                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>--}}
{{--                            <textarea></textarea>--}}
{{--                            <button type="submit" class="btn btn-primary">Procesar</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                    <form method="POST" action="{{ route('postcomercial') }}" class="col-sm-10">
                        @csrf
                        <div class="row ">
                            <div class="col-sm-10 ">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                              </span>
                                        </div>
                                        <input type="text" name="fechas" class="form-control float-right" id="filtrofecha" >

                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Procesar</button>
                            </div>
                        </div>
                    </form>
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
                                            <h3 class="card-title">Venta Diaria Millares {{$startDate->format('Y-m')}}</h3>
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
                            </div>
{{--                            @if(Auth::user()->id==1)--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header border-0">--}}
{{--                                            <div class="d-flex justify-content-between">--}}
{{--                                                <h3 class="card-title">{{$startDate->format('Y-m')}}</h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="card-body pt-0 mt-0">--}}
{{--                                            <div class="d-flex">--}}
{{--                                                <p class="d-flex flex-column">--}}
{{--                                                    <span class="text-bold text-lg">Comparativo Anual</span>--}}
{{--                                            </div>--}}
{{--                                            <!-- /.d-flex -->--}}

{{--                                            <div class="position-relative mb-4">--}}
{{--                                                <canvas id="despachodiariomillartotal-chart" height="200"></canvas>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
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
                                            <h3 class="card-title">Venta Diaria Soles {{$startDate->format('Y-m')}}</h3>
                                            {{--                                <a href="javascript:void(0);">View Report</a>--}}
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 mt-0">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span class="text-bold text-lg">Total {{$dataDespachoDiaroSoles['total']}} Miles de Soles</span>
                                                <span></span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->

                                        <div class="position-relative mb-4">
                                            <canvas id="despachodiariosoles-chart" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            @if(Auth::user()->id==1)--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header border-0">--}}
{{--                                            <div class="d-flex justify-content-between">--}}
{{--                                                <h3 class="card-title">{{$startDate->format('Y-m')}}</h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="card-body pt-0 mt-0">--}}
{{--                                            <div class="d-flex">--}}
{{--                                                <p class="d-flex flex-column">--}}
{{--                                                    <span class="text-bold text-lg">Comparativo Anual</span>--}}
{{--                                            </div>--}}

{{--                                            <div class="position-relative mb-4">--}}
{{--                                                <canvas id="despachodiariosolestotal-chart" height="200"></canvas>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>fecha</th>
                                        <th>cantidad</th>
{{--                                        <th>3</th>--}}
{{--                                        <th>4</th>--}}
{{--                                        <th>5</th>--}}
{{--                                        <th>6</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @foreach($raw6 as $item)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$item->fecha}}</td>--}}
{{--                                        <td>{{$item->cantidad}}</td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}
                                    </tbody>
{{--                                    <thead></thead>--}}
{{--                                    <tbody></tbody>--}}
{{--                                    <tr>--}}
{{--                                        <th>Column 1</th>--}}
{{--                                        <th>Column 2</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>Row 1 Data 1</td>--}}
{{--                                        <td>Row 1 Data 2</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Row 2 Data 1</td>--}}
{{--                                        <td>Row 2 Data 2</td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Rendering engine</th>--}}
{{--                                        <th>Browser</th>--}}
{{--                                        <th>Platform(s)</th>--}}
{{--                                        <th>Engine version</th>--}}
{{--                                        <th>CSS grade</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>Trident</td>--}}
{{--                                        <td>Internet--}}
{{--                                            Explorer 4.0--}}
{{--                                        </td>--}}
{{--                                        <td>Win 95+</td>--}}
{{--                                        <td> 4</td>--}}
{{--                                        <td>X</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Trident</td>--}}
{{--                                        <td>Internet--}}
{{--                                            Explorer 5.0--}}
{{--                                        </td>--}}
{{--                                        <td>Win 95+</td>--}}
{{--                                        <td>5</td>--}}
{{--                                        <td>C</td>--}}
{{--                                    </tr>--}}

{{--                                    </tbody>--}}
{{--                                    <tfoot>--}}
{{--                                    <tr>--}}
{{--                                        <th>Rendering engine</th>--}}
{{--                                        <th>Browser</th>--}}
{{--                                        <th>Platform(s)</th>--}}
{{--                                        <th>Engine version</th>--}}
{{--                                        <th>CSS grade</th>--}}
{{--                                    </tr>--}}
{{--                                    </tfoot>--}}
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 4.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td> 4</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td>5</td>
                                        <td>C</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>


        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>

        window.onload = function () {
            // var aDemoItems = [
            //     {
            //         "patientId": 1,
            //         "otherId": "LanTest101",
            //         // "firstName":"x1",
            //         // "lastName":"yLanTest101",
            //         // "gender":"M",
            //         // "dob":"10/16/1941",
            //         // "race":"Caucasian/White"
            //     },];
            $("#example2").DataTable({
                data:{!! json_encode($raw6) !!},
                columns: [
                        { data: 'fecha' },
                        { data: 'cantidad' },

                    ],
                searching: false,
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv',
                    'excel',
                    // 'pdf', 'print'
                ]
                // "paging": true,
                // "lengthChange": false,
                // "searching": false,
                // "ordering": true,
                // "info": true,
                // "autoWidth": false,
                // "responsive": true,
                // buttons: [
                //     'excel'
                // ]
                // buttons: [
                //     {
                //         extend: 'excel',
                //         text: 'Save current page',
                //         exportOptions: {
                //             modifier: {
                //                 page: 'current'
                //             }
                //         }
                //     }
                // ]
        });
                // {
                //
                // data: [
                //     {
                //         "name":       "Tiger Nixon",
                //         "position":   "System Architect",
                //         "salary":     "$3,120",
                //         "start_date": "2011/04/25",
                //         "office":     "Edinburgh",
                //         "extn":       "5421"
                //     },
                //     {
                //         "name":       "Garrett Winters",
                //         "position":   "Director",
                //         "salary":     "$5,300",
                //         "start_date": "2011/07/25",
                //         "office":     "Edinburgh",
                //         "extn":       "8422"
                //     }
                // ],
                //     // "autoWidth": false,
                //     // "responsive": true,
                // // "ajax": {
                // //     "data" : aDemoItems,
                // //     "dataSrc": "Data", //<--- place dataSrc here instead
                // //     // "type": "POST",
                // //     // ...
                // // },
                // columns: [
                //     { data: 'name' },
                //     { data: 'position' },
                //     { data: 'salary' },
                //     { data: 'office' }
                // ]
                //     });
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // });

            //Date range picker
            //$('#reservation').daterangepicker()
            //Date range picker with time picker

            $('#filtrofecha').daterangepicker({
                "locale": {

                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "Ok",
                    "cancelLabel": "Cancel",
                    "fromLabel": "Desde",
                    "toLabel": "Hasta",
                    minDate: '01/01/2012',
                    maxDate: '12/31/2014',
                    dateLimit: { days: 60 },
                    // "customRangeLabel": "Custom",
                    // "minYear": "2019",
                    // "maxYear": parseInt(moment().format('YYYY'),10),
                    "daysOfWeek": [
                        "Do",
                        "Lu",
                        "Ma",
                        "Mi",
                        "Ju",
                        "Vi",
                        "Sa"
                    ],
                    "monthNames": [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agusto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ],
                    "firstDay": 1
                }
            })


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
                }
            });

            var ctx = document.getElementById('despachodiariosoles-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($dataDespachoDiaroSoles['fecha']) !!},
                    datasets: [{
                        label: 'Soles',
                        data:{!! json_encode($dataDespachoDiaroSoles['cantidad']) !!},
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
                    // plugins: {
                    //     datalabels: {
                    //
                    //     }
                    //
                    // }
                }
            });
        }

    </script>



@endsection
