@extends('layouts.Dashboard.template')
@section('content')
    <div class="content">
        <div class="container-fluid">
           <div class="row mt-2 mb-0">
                <div class="col-sm-6">
                    <h2 class="m-0 text-dark">Comercial</h2>
                </div>
                <div class="col-sm-6">
                    <form role="form" class="col-sm-10">
                        <div class="row mb-0">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                              </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="filtrofecha">
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
                                    <h3 class="card-title">Descargas de Horno  {{$startDate->format('Y-m')}}</h3>
                                    {{--                                <a href="javascript:void(0);">View Report</a>--}}
                                </div>
                            </div>
                            <div class="card-body pt-0 mt-0">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">Total  Millares</span>
                                        <span></span>
                                    </p>
                                </div>

                                <div class="position-relative mb-4">
                                    <canvas id="descargahorno-chart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
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
                        </div>
                    @endif
            </div>


        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
        window.onload = function () {


            //Date range picker
            //$('#reservation').daterangepicker()
            //Date range picker with time picker

            $('#filtrofecha').daterangepicker({
                "locale": {
                    "format": "MM/DD/YYYY",
                    "separator": " - ",
                    "applyLabel": "Ok",
                    "cancelLabel": "Cancel",
                    "fromLabel": "Desde",
                    "toLabel": "Hasta",
                    "customRangeLabel": "Custom",
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
        }
    </script>



@endsection
