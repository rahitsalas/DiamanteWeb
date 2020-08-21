<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdministracionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $startDate = Carbon::now()->addDays(-1);
        dd($startDate);
    }

    public function administracion(Request $request)
    {
        $getfecha = $request->input('fechas') ?: null;
        if($getfecha != null){
            $fechas = explode(' - ', $getfecha);
            $startDate = Carbon::now();
            $firstDay = Carbon::createFromFormat('d/m/Y', $fechas[0]);
            // dd($startDate,$fechas[0],$fechas[1],Carbon::createFromFormat('d/m/Y', $fechas[1]));
            $lastDay = Carbon::createFromFormat('d/m/Y', $fechas[1]);
        }

        else{
            $diasatraso = -1;
            $startDate = Carbon::now()->addDays($diasatraso);
            $firstDay = Carbon::now()->addDays($diasatraso)->startOfMonth();
            $lastDay = Carbon::now()->addDays($diasatraso)->lastOfMonth();
        }

        $raw1 = DB::select("exec [DiamanteWeb].dbo.sp_data_OrdenCompraServicioSoles ");
        $raw2 = DB::select("exec [DiamanteWeb].dbo.sp_data_OrdenCompraServicioGastos ");
        $raw3 = DB::select("exec [DiamanteWeb].dbo.sp_data_OrdenCompraServicioActivos ");
        $raw4 = DB::select("exec [DiamanteWeb].dbo.sp_data_OrdenCompraServicioCantidad ");
        $raw5 = DB::select("exec [DiamanteWeb].dbo.sp_data_OrdenCompraServicioMix ");
       // dd($raw1);

       // $raw5 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoDiarioMillar '".$firstDay."', '".$lastDay."'");
      //  $raw6 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoDiarioSoles '".$firstDay."', '".$lastDay."'");
//        dd($startDate,$raw5,$raw6);
//        $firstDay = Carbon::now()->addDays(-1)->startOfMonth();
//        $lastDay = Carbon::now()->addDays(-1)->lastOfMonth();

        $dataOrdenCompraServicioSolesActual = array();
        $dataOrdenCompraServicioSolesPasado = array();

        $dataOrdenCompraServicioGastosActual  = array();
        $dataOrdenCompraServicioGastosPasado = array();

        $dataOrdenCompraServicioActivosActual  = array();
        $dataOrdenCompraServicioActivosPasado = array();

        $dataOrdenCompraServicioCantidadActual  = array();
        $dataOrdenCompraServicioCantidadPasado = array();

        $dataOrdenCompraServicioMixActualOS = array();
        $dataOrdenCompraServicioMixActualOC = array();
        $dataOrdenCompraServicioMixPasadoOS  = array();
        $dataOrdenCompraServicioMixPasadoOC = array();

        $dataDespachoDiaroMillar = array();
        $dataDespachoDiaroSoles = array();


        $j =0;
        $k =0;
        foreach ($raw1 as $item){
//            var_dump($item);
            if((string)$item->año === (string)$startDate->year ) {
//                var_dump("-----------------");
//                var_dump((string)$startDate->year);
                //var_dump((string)$item->año);
                //$dataDespachoDiaroMillar['fecha'][$i] = date_create($item->fecha)->format('d-m');
                $dataOrdenCompraServicioSolesActual['montototal'][$j] = round((double)$item->MontoTotal, 2, PHP_ROUND_HALF_UP);
                $dataOrdenCompraServicioSolesActual['año'] = $item->año;
                $dataOrdenCompraServicioSolesActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            elseif((string)$item->año === (string)($startDate->year-1)){
                $dataOrdenCompraServicioSolesPasado['montototal'][$k] = round((double)$item->MontoTotal, 2, PHP_ROUND_HALF_UP);
                $dataOrdenCompraServicioSolesPasado['año'] = $item->año;
                $dataOrdenCompraServicioSolesPasado['mes'][$k] = $item->mesdescripcion;
                $k++;
            }
        }

        $j =0;
        $k =0;
        foreach ($raw2 as $item){
//            var_dump($item);
            if((string)$item->año === (string)$startDate->year ) {
//                var_dump("-----------------");
//                var_dump((string)$startDate->year);
                //var_dump((string)$item->año);
                //$dataDespachoDiaroMillar['fecha'][$i] = date_create($item->fecha)->format('d-m');
                $dataOrdenCompraServicioGastosActual['montototal'][$j] = round((double)$item->MontoTotal, 2, PHP_ROUND_HALF_UP);
                $dataOrdenCompraServicioGastosActual['año'] = $item->año;
                $dataOrdenCompraServicioGastosActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            elseif((string)$item->año === (string)($startDate->year-1)){
                $dataOrdenCompraServicioGastosPasado['montototal'][$k] = round((double)$item->MontoTotal, 2, PHP_ROUND_HALF_UP);
                $dataOrdenCompraServicioGastosPasado['año'] = $item->año;
                $dataOrdenCompraServicioGastosPasado['mes'][$k] = $item->mesdescripcion;
                $k++;
            }
        }

        $j =0;
        $k =0;
        foreach ($raw3 as $item){
//            var_dump($item);
            if((string)$item->año === (string)$startDate->year ) {
//                var_dump("-----------------");
//                var_dump((string)$startDate->year);
                //var_dump((string)$item->año);
                //$dataDespachoDiaroMillar['fecha'][$i] = date_create($item->fecha)->format('d-m');
                $dataOrdenCompraServicioActivosActual['montototal'][$j] = round((double)$item->MontoTotal, 2, PHP_ROUND_HALF_UP);
                $dataOrdenCompraServicioActivosActual['año'] = $item->año;
                $dataOrdenCompraServicioActivosActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            elseif((string)$item->año === (string)($startDate->year-1)){
                $dataOrdenCompraServicioActivosPasado['montototal'][$k] = round((double)$item->MontoTotal, 2, PHP_ROUND_HALF_UP);
                $dataOrdenCompraServicioActivosPasado['año'] = $item->año;
                $dataOrdenCompraServicioActivosPasado['mes'][$k] = $item->mesdescripcion;
                $k++;
            }
        }

        $j =0;
        $k =0;
        foreach ($raw4 as $item){
//            var_dump($item);
            if((string)$item->año === (string)$startDate->year ) {
//                var_dump("-----------------");
//                var_dump((string)$startDate->year);
                //var_dump((string)$item->año);
                //$dataDespachoDiaroMillar['fecha'][$i] = date_create($item->fecha)->format('d-m');
                $dataOrdenCompraServicioCantidadActual['cantidad'][$j] = $item->cantidad;
                $dataOrdenCompraServicioCantidadActual['año'] = $item->año;
                $dataOrdenCompraServicioCantidadActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            elseif((string)$item->año === (string)($startDate->year-1)){
                $dataOrdenCompraServicioCantidadPasado['cantidad'][$k] = $item->cantidad;
                $dataOrdenCompraServicioCantidadPasado['año'] = $item->año;
                $dataOrdenCompraServicioCantidadPasado['mes'][$k] = $item->mesdescripcion;
                $k++;
            }
        }

        $j =0;
        $k =0;
        $l =0;
        $i =0;
        //dd($raw5);
        foreach ($raw5 as $item){
//            var_dump($item);
            if((string)$item->año === (string)$startDate->year and $item->clasificacion == 'Orden de Servicio') {
//                var_dump("-----------------");
//                var_dump((string)$startDate->year);
                //var_dump((string)$item->año);
                //$dataDespachoDiaroMillar['fecha'][$i] = date_create($item->fecha)->format('d-m');
                $dataOrdenCompraServicioMixActualOS['porcentaje'][$j] = round((double)$item->porcentaje, 0, PHP_ROUND_HALF_UP);
                $dataOrdenCompraServicioMixActualOS['clasificacion'] = $item->clasificacion;
                $dataOrdenCompraServicioMixActualOS['mes'][$j] = (string)($startDate->year-1).' '.$item->mesdescripcion.' '.(string)($startDate->year);
                $j++;
            }
            elseif((string)$item->año === (string)($startDate->year-1) and $item->clasificacion == 'Orden de Servicio'){
                $dataOrdenCompraServicioMixPasadoOS['porcentaje'][$k] = round((double)$item->porcentaje, 0, PHP_ROUND_HALF_UP);
                $dataOrdenCompraServicioMixPasadoOS['clasificacion'] = $item->clasificacion;
                $dataOrdenCompraServicioMixPasadoOS['mes'][$k] = $item->mesdescripcion;
                $k++;
            }
            elseif((string)$item->año === (string)$startDate->year and $item->clasificacion == 'Orden de Compra'){
                $dataOrdenCompraServicioMixActualOC['porcentaje'][$l] = round((double)$item->porcentaje, 0, PHP_ROUND_HALF_UP);
                $dataOrdenCompraServicioMixActualOC['clasificacion'] = $item->clasificacion;
                $dataOrdenCompraServicioMixActualOC['mes'][$l] = $item->mesdescripcion;
                $l++;
            }
            elseif((string)$item->año === (string)($startDate->year-1) and $item->clasificacion == 'Orden de Compra'){
                $dataOrdenCompraServicioMixPasadoOC['porcentaje'][$i] = round((double)$item->porcentaje, 0, PHP_ROUND_HALF_UP);
                $dataOrdenCompraServicioMixPasadoOC['clasificacion'] = $item->clasificacion;
                $dataOrdenCompraServicioMixPasadoOC['mes'][$i] = $item->mesdescripcion;
                $i++;
            }
        }

        //dd($dataOrdenCompraServicioMixActualOS,$dataOrdenCompraServicioMixPasadoOS,$dataOrdenCompraServicioMixActualOC,$dataOrdenCompraServicioMixPasadoOC);

        //dd($dataOrdenCompraServicioSolesActual,$dataOrdenCompraServicioSolesPasado);

//        $i =0;
//        $dataDespachoDiaroMillar['total'] = 0;
//        foreach ($raw5 as $item){
//            $dataDespachoDiaroMillar['fecha'][$i] = date_create($item->fecha)->format('d-m');
//            $dataDespachoDiaroMillar['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
//            $dataDespachoDiaroMillar['total'] += $item->cantidad;
//            $i++;
//        }
//        $dataDespachoDiaroMillar['total'] =round((double)$dataDespachoDiaroMillar['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataDespachoDiaroSoles['total'] = 0;
//        foreach ($raw6 as $item){
//            $dataDespachoDiaroSoles['fecha'][$i] = date_create($item->fecha)->format('d-m');
//            $dataDespachoDiaroSoles['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
//            $dataDespachoDiaroSoles['total'] += $item->cantidad;
//            $i++;
//        }
//        $dataDespachoDiaroSoles['total'] =round((double)$dataDespachoDiaroSoles['total'],0,PHP_ROUND_HALF_UP);


        return view ('Dashboard.Reportes.administracion',compact('startDate',
            'dataOrdenCompraServicioSolesActual','dataOrdenCompraServicioSolesPasado',
            'dataOrdenCompraServicioGastosActual', 'dataOrdenCompraServicioGastosPasado',
            'dataOrdenCompraServicioActivosActual', 'dataOrdenCompraServicioActivosPasado',
            'dataOrdenCompraServicioCantidadActual','dataOrdenCompraServicioCantidadPasado',
            'dataOrdenCompraServicioMixActualOS','dataOrdenCompraServicioMixPasadoOS',
            'dataOrdenCompraServicioMixActualOC','dataOrdenCompraServicioMixPasadoOC'
        ));
    }
}

