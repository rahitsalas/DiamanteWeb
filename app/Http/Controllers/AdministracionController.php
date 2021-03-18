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

    //Solo para probar
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
        $raw6 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionPendiente42 '".$startDate."'");
//        dd($startDate,$raw1,$raw2,$raw3,$raw4,$raw5,$raw6);
        $raw7 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacion '".$startDate."'");
        $raw8 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacionVencida '".$startDate."'");
        $raw9 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacionxVencer '".$startDate."'");
        $raw10 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacionDeuda '".$startDate."'");
        $raw11 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionPendiente43 '".$startDate."'");
//         dd($raw11,$raw6);

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

        $dataPagosPendientes42 = array();
        $dataPagosPendientes43 = array();
        $dataPagosClasificacion = array();
        $dataPagosClasificacionVencida = array();
        $dataPagosClasificacionxVencer = array();
        $dataPagosClasificacionFlujoVencida = array();
        $dataPagosClasificacionFlujoxVencer = array();



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
                $dataOrdenCompraServicioMixActualOS['mes'][$j] = substr((string)($startDate->year-1),2,2).' '.substr($item->mesdescripcion,0,3).'. '.substr((string)($startDate->year),2,2);
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



        $i =0;
        $dataPagosPendientes42['total'] = 0;
        foreach ($raw6 as $item){
            $dataPagosPendientes42['proveedor'][$i] = $item->proveedor;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosPendientes42['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosPendientes42['total'] += $item->monto;
            $i++;
        }
        $dataPagosPendientes42['total'] =round((double)$dataPagosPendientes42['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataPagosClasificacion['total'] = 0;
        foreach ($raw7 as $item){
            $dataPagosClasificacion['vencidaflag'][$i] = $item->vencidaflag;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosClasificacion['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosClasificacion['total'] += $item->monto;
            $i++;
        }
        $dataPagosClasificacion['total'] =round((double)$dataPagosClasificacion['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataPagosClasificacionVencida['total'] = 0;
        foreach ($raw8 as $item){
            $dataPagosClasificacionVencida['clasificacion'][$i] = $item->clasificacion;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosClasificacionVencida['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosClasificacionVencida['total'] += $item->monto;
            $i++;
        }
        $dataPagosClasificacionVencida['total'] =round((double)$dataPagosClasificacionVencida['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataPagosClasificacionxVencer['total'] = 0;
        foreach ($raw9 as $item){
            $dataPagosClasificacionxVencer['clasificacion'][$i] = $item->clasificacion;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosClasificacionxVencer['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosClasificacionxVencer['total'] += $item->monto;
            $i++;
        }
        $dataPagosClasificacionxVencer['total'] =round((double)$dataPagosClasificacionxVencer['total'],0,PHP_ROUND_HALF_UP);


        $j =0;
        $k =0;
//        $l =0;
//        $i =1;
//        dd($raw10);

        $dataPagosClasificacionFlujoVencida['total'] = 0;
        foreach ($raw10 as $item){
//            var_dump($item);
            $dataPagosClasificacionFlujoVencida['total'] += $item->monto;
            if($item->vencidaflag == 'Vencida') {

//                var_dump("-----------------");
//                var_dump((string)$startDate->year);
                //var_dump((string)$item->año);
                //$dataDespachoDiaroMillar['fecha'][$i] = date_create($item->fecha)->format('d-m');
                $dataPagosClasificacionFlujoVencida['monto'][$j] = round((double)$item->monto, 0, PHP_ROUND_HALF_UP);
                $dataPagosClasificacionFlujoVencida['flujo'][$j] = $item->flujoagrupador;
                $dataPagosClasificacionFlujoVencida['vencidaflag'] = $item->vencidaflag;
//                $dataPagosClasificacionDeuda['mes'][$j] = substr((string)($startDate->year-1),2,2).' '.substr($item->mesdescripcion,0,3).'. '.substr((string)($startDate->year),2,2);
                $j++;
            }
            else{
                $dataPagosClasificacionFlujoxVencer['monto'][$k] = round((double)$item->monto, 0, PHP_ROUND_HALF_UP);
                $dataPagosClasificacionFlujoxVencer['flujo'][$k] = $item->flujoagrupador;
                $dataPagosClasificacionFlujoxVencer['vencidaflag'] = $item->vencidaflag;
                $k++;
            }
//            elseif((string)$item->año === (string)$startDate->year and $item->clasificacion == 'Orden de Compra'){
//                $dataOrdenCompraServicioMixActualOC['porcentaje'][$l] = round((double)$item->porcentaje, 0, PHP_ROUND_HALF_UP);
//                $dataOrdenCompraServicioMixActualOC['clasificacion'] = $item->clasificacion;
//                $dataOrdenCompraServicioMixActualOC['mes'][$l] = $item->mesdescripcion;
//                $l++;
//            }
//            elseif((string)$item->año === (string)($startDate->year-1) and $item->clasificacion == 'Orden de Compra'){
//                $dataOrdenCompraServicioMixPasadoOC['porcentaje'][$i] = round((double)$item->porcentaje, 0, PHP_ROUND_HALF_UP);
//                $dataOrdenCompraServicioMixPasadoOC['clasificacion'] = $item->clasificacion;
//                $dataOrdenCompraServicioMixPasadoOC['mes'][$i] = $item->mesdescripcion;
//                $i++;
//            }
        }
        $dataPagosClasificacionFlujoVencida['total'] =round((double)$dataPagosClasificacionFlujoVencida['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataPagosPendientes43['total'] = 0;
        foreach ($raw11 as $item){
            $dataPagosPendientes43['proveedor'][$i] = $item->proveedor;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosPendientes43['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosPendientes43['total'] += $item->monto;
            $i++;
        }
        $dataPagosPendientes43['total'] =round((double)$dataPagosPendientes43['total'],0,PHP_ROUND_HALF_UP);

//        dd($dataPagosPendientes43,$dataPagosPendientes42);

        //dd($dataPagosClasificacionxVencer,$dataOrdenCompraServicioMixPasadoOS,$dataOrdenCompraServicioMixActualOC,$dataOrdenCompraServicioMixPasadoOC);

//        dd($dataPagosPendientes,$dataPagosClasificacion,$dataPagosClasificacionxVencer,$dataPagosClasificacionVencida);

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
            'dataOrdenCompraServicioMixActualOC','dataOrdenCompraServicioMixPasadoOC',
            'dataPagosPendientes42','dataPagosClasificacion',
            'dataPagosClasificacionxVencer','dataPagosClasificacionVencida',
            'dataPagosClasificacionFlujoVencida','dataPagosClasificacionFlujoxVencer',
            'dataPagosPendientes43'
        ));



    }
    //Solo para probar

    public function almacen(Request $request)
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


        $raw11 = DB::select("exec [DiamanteWeb].dbo.sp_data_StockTotalCalidad '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11);
        $raw12 = DB::select("exec [DiamanteWeb].dbo.sp_data_StockTotalTipoItem '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12);
        $raw13 = DB::select("exec [DiamanteWeb].dbo.sp_data_StockTotalAlmacen '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13);
        $raw14 = DB::select("exec [DiamanteWeb].dbo.sp_data_StockFamiliaEstructural '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14);
        $raw15 = DB::select("exec [DiamanteWeb].dbo.sp_data_StockFamiliaTabiqueria '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15);
        $raw16 = DB::select("exec [DiamanteWeb].dbo.sp_data_StockFamiliaParaTecho '".$firstDay."', '".$lastDay."'");


        $dataStockTotalCalidad = array();
        $dataStockTotalTipoItem = array();
        $dataStockTotalAlmacen = array();
        $dataStockFamiliaEstructural = array();
        $dataStockFamiliaTabiqueria = array();
        $dataStockFamiliaParaTecho = array();


        $i =0;
        $dataStockTotalCalidad['total'] = 0;
        foreach ($raw11 as $item){
            $dataStockTotalCalidad['calidad'][$i] = $item->calidad;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataStockTotalCalidad['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataStockTotalCalidad['total'] += $item->cantidad;
            $i++;
        }
        $dataStockTotalCalidad['total'] =round((double)$dataStockTotalCalidad['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataStockTotalTipoItem['total'] = 0;
        foreach ($raw12 as $item){
            $dataStockTotalTipoItem['familia'][$i] = $item->familia;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataStockTotalTipoItem['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataStockTotalTipoItem['total'] += $item->cantidad;
            $i++;
        }
        $dataStockTotalTipoItem['total'] =round((double)$dataStockTotalTipoItem['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataStockTotalAlmacen['total'] = 0;
        foreach ($raw13 as $item){
            $dataStockTotalAlmacen['almacen'][$i] = $item->almacen;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataStockTotalAlmacen['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataStockTotalAlmacen['total'] += $item->cantidad;
            $i++;
        }
        $dataStockTotalAlmacen['total'] =round((double)$dataStockTotalAlmacen['total'],0,PHP_ROUND_HALF_UP);


        $i =0;
        $dataStockFamiliaEstructural['total'] = 0;
        foreach ($raw14 as $item){
            $dataStockFamiliaEstructural['item'][$i] = $item->item;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataStockFamiliaEstructural['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataStockFamiliaEstructural['total'] += $item->cantidad;
            $i++;
        }
        $dataStockFamiliaEstructural['total'] =round((double)$dataStockFamiliaEstructural['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataStockFamiliaTabiqueria['total'] = 0;
        foreach ($raw15 as $item){
            $dataStockFamiliaTabiqueria['item'][$i] = $item->item;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataStockFamiliaTabiqueria['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataStockFamiliaTabiqueria['total'] += $item->cantidad;
            $i++;
        }
        $dataStockFamiliaTabiqueria['total'] =round((double)$dataStockFamiliaTabiqueria['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataStockFamiliaParaTecho['total'] = 0;
        foreach ($raw16 as $item){
            $dataStockFamiliaParaTecho['item'][$i] = $item->item;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataStockFamiliaParaTecho['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataStockFamiliaParaTecho['total'] += $item->cantidad;
            $i++;
        }
        $dataStockFamiliaParaTecho['total'] =round((double)$dataStockFamiliaParaTecho['total'],0,PHP_ROUND_HALF_UP);






        return view ('Dashboard.Reportes.Administracion.almacen',compact('startDate',
            'dataStockTotalCalidad','dataStockTotalTipoItem',
            'dataStockTotalAlmacen','dataStockFamiliaEstructural',
            'dataStockFamiliaTabiqueria','dataStockFamiliaParaTecho'

        ));



    }


    public function contabilidad(Request $request)
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
        $raw6 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionPendiente42 '".$startDate."'");
//        dd($startDate,$raw1,$raw2,$raw3,$raw4,$raw5,$raw6);
        $raw7 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacion '".$startDate."'");
        $raw8 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacionVencida '".$startDate."'");
        $raw9 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacionxVencer '".$startDate."'");
        $raw10 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacionDeuda '".$startDate."'");
        $raw11 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionPendiente43 '".$startDate."'");
//         dd($raw11,$raw6);

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

        $dataPagosPendientes42 = array();
        $dataPagosPendientes43 = array();
        $dataPagosClasificacion = array();
        $dataPagosClasificacionVencida = array();
        $dataPagosClasificacionxVencer = array();
        $dataPagosClasificacionFlujoVencida = array();
        $dataPagosClasificacionFlujoxVencer = array();



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
                $dataOrdenCompraServicioMixActualOS['mes'][$j] = substr((string)($startDate->year-1),2,2).' '.substr($item->mesdescripcion,0,3).'. '.substr((string)($startDate->year),2,2);
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



        $i =0;
        $dataPagosPendientes42['total'] = 0;
        foreach ($raw6 as $item){
            $dataPagosPendientes42['proveedor'][$i] = $item->proveedor;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosPendientes42['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosPendientes42['total'] += $item->monto;
            $i++;
        }
        $dataPagosPendientes42['total'] =round((double)$dataPagosPendientes42['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataPagosClasificacion['total'] = 0;
        foreach ($raw7 as $item){
            $dataPagosClasificacion['vencidaflag'][$i] = $item->vencidaflag;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosClasificacion['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosClasificacion['total'] += $item->monto;
            $i++;
        }
        $dataPagosClasificacion['total'] =round((double)$dataPagosClasificacion['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataPagosClasificacionVencida['total'] = 0;
        foreach ($raw8 as $item){
            $dataPagosClasificacionVencida['clasificacion'][$i] = $item->clasificacion;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosClasificacionVencida['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosClasificacionVencida['total'] += $item->monto;
            $i++;
        }
        $dataPagosClasificacionVencida['total'] =round((double)$dataPagosClasificacionVencida['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataPagosClasificacionxVencer['total'] = 0;
        foreach ($raw9 as $item){
            $dataPagosClasificacionxVencer['clasificacion'][$i] = $item->clasificacion;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosClasificacionxVencer['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosClasificacionxVencer['total'] += $item->monto;
            $i++;
        }
        $dataPagosClasificacionxVencer['total'] =round((double)$dataPagosClasificacionxVencer['total'],0,PHP_ROUND_HALF_UP);


        $j =0;
        $k =0;
//        $l =0;
//        $i =1;
//        dd($raw10);

        $dataPagosClasificacionFlujoVencida['total'] = 0;
        foreach ($raw10 as $item){
//            var_dump($item);
            $dataPagosClasificacionFlujoVencida['total'] += $item->monto;
            if($item->vencidaflag == 'Vencida') {

//                var_dump("-----------------");
//                var_dump((string)$startDate->year);
                //var_dump((string)$item->año);
                //$dataDespachoDiaroMillar['fecha'][$i] = date_create($item->fecha)->format('d-m');
                $dataPagosClasificacionFlujoVencida['monto'][$j] = round((double)$item->monto, 0, PHP_ROUND_HALF_UP);
                $dataPagosClasificacionFlujoVencida['flujo'][$j] = $item->flujoagrupador;
                $dataPagosClasificacionFlujoVencida['vencidaflag'] = $item->vencidaflag;
//                $dataPagosClasificacionDeuda['mes'][$j] = substr((string)($startDate->year-1),2,2).' '.substr($item->mesdescripcion,0,3).'. '.substr((string)($startDate->year),2,2);
                $j++;
            }
            else{
                $dataPagosClasificacionFlujoxVencer['monto'][$k] = round((double)$item->monto, 0, PHP_ROUND_HALF_UP);
                $dataPagosClasificacionFlujoxVencer['flujo'][$k] = $item->flujoagrupador;
                $dataPagosClasificacionFlujoxVencer['vencidaflag'] = $item->vencidaflag;
                $k++;
            }
//            elseif((string)$item->año === (string)$startDate->year and $item->clasificacion == 'Orden de Compra'){
//                $dataOrdenCompraServicioMixActualOC['porcentaje'][$l] = round((double)$item->porcentaje, 0, PHP_ROUND_HALF_UP);
//                $dataOrdenCompraServicioMixActualOC['clasificacion'] = $item->clasificacion;
//                $dataOrdenCompraServicioMixActualOC['mes'][$l] = $item->mesdescripcion;
//                $l++;
//            }
//            elseif((string)$item->año === (string)($startDate->year-1) and $item->clasificacion == 'Orden de Compra'){
//                $dataOrdenCompraServicioMixPasadoOC['porcentaje'][$i] = round((double)$item->porcentaje, 0, PHP_ROUND_HALF_UP);
//                $dataOrdenCompraServicioMixPasadoOC['clasificacion'] = $item->clasificacion;
//                $dataOrdenCompraServicioMixPasadoOC['mes'][$i] = $item->mesdescripcion;
//                $i++;
//            }
        }
        $dataPagosClasificacionFlujoVencida['total'] =round((double)$dataPagosClasificacionFlujoVencida['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataPagosPendientes43['total'] = 0;
        foreach ($raw11 as $item){
            $dataPagosPendientes43['proveedor'][$i] = $item->proveedor;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosPendientes43['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosPendientes43['total'] += $item->monto;
            $i++;
        }
        $dataPagosPendientes43['total'] =round((double)$dataPagosPendientes43['total'],0,PHP_ROUND_HALF_UP);

//        dd($dataPagosPendientes43,$dataPagosPendientes42);

        //dd($dataPagosClasificacionxVencer,$dataOrdenCompraServicioMixPasadoOS,$dataOrdenCompraServicioMixActualOC,$dataOrdenCompraServicioMixPasadoOC);

//        dd($dataPagosPendientes,$dataPagosClasificacion,$dataPagosClasificacionxVencer,$dataPagosClasificacionVencida);

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
            'dataOrdenCompraServicioMixActualOC','dataOrdenCompraServicioMixPasadoOC',
            'dataPagosPendientes42','dataPagosClasificacion',
            'dataPagosClasificacionxVencer','dataPagosClasificacionVencida',
            'dataPagosClasificacionFlujoVencida','dataPagosClasificacionFlujoxVencer',
            'dataPagosPendientes43'
        ));



    }


    public function compras(Request $request)
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
                $dataOrdenCompraServicioMixActualOS['mes'][$j] = substr((string)($startDate->year-1),2,2).' '.substr($item->mesdescripcion,0,3).'. '.substr((string)($startDate->year),2,2);
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


        return view ('Dashboard.Reportes.Administracion.compras',compact('startDate',
            'dataOrdenCompraServicioSolesActual','dataOrdenCompraServicioSolesPasado',
            'dataOrdenCompraServicioGastosActual', 'dataOrdenCompraServicioGastosPasado',
            'dataOrdenCompraServicioActivosActual', 'dataOrdenCompraServicioActivosPasado',
            'dataOrdenCompraServicioCantidadActual','dataOrdenCompraServicioCantidadPasado',
            'dataOrdenCompraServicioMixActualOS','dataOrdenCompraServicioMixPasadoOS',
            'dataOrdenCompraServicioMixActualOC','dataOrdenCompraServicioMixPasadoOC'
        ));



    }


    public function creditos(Request $request)
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

        $raw1 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidad '00'"); //TODOS
        $raw2 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidad '01'"); //CF
        $raw3 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidad '02'"); //CO
        $raw4 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidad '05'"); //MG
        $raw5 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidad '06'"); //SP
        $raw6 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidad '12'"); //FE
        $raw7 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidad '13'"); //DI


        $raw17 = DB::select("exec [DiamanteWeb].dbo.sp_data_IngresosCobranzaDiario '".$firstDay."', '".$lastDay."'");
        $raw18 = DB::select("exec [DiamanteWeb].dbo.sp_data_IngresosCobranzaAcumulado '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16,$raw17,$raw18);
        $raw19 = DB::select("exec [DiamanteWeb].dbo.sp_data_CobranzaDeudaMorosa '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16,$raw17,$raw18,$raw19);
        $raw20 = DB::select("exec [DiamanteWeb].dbo.sp_data_CobranzaClasificacion '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16,$raw17,$raw18,$raw19,$raw20);
        $raw21 = DB::select("exec [DiamanteWeb].dbo.sp_data_CobranzaClasificacionVencida '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16,$raw17,$raw18,$raw19,$raw20,$raw21);
        $raw22 = DB::select("exec [DiamanteWeb].dbo.sp_data_CobranzaClasificacionxVencer '".$firstDay."', '".$lastDay."'");


        $dataIndiceMorisidadDetalle00 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidadDetallado '00'");
        $dataIndiceMorisidadDetalle01 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidadDetallado '01'");
        $dataIndiceMorisidadDetalle02 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidadDetallado '02'");
        $dataIndiceMorisidadDetalle05 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidadDetallado '05'");
        $dataIndiceMorisidadDetalle06 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidadDetallado '06'");
        $dataIndiceMorisidadDetalle12 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidadDetallado '12'");
        $dataIndiceMorisidadDetalle13 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceMorosidadDetallado '13'");


//        dd($dataIndiceMorisidadDetalle);

        $dataIndiceMorosidad00 = array();
        $dataIndiceMorosidad01 = array();
        $dataIndiceMorosidad02 = array();
        $dataIndiceMorosidad05 = array();
        $dataIndiceMorosidad06 = array();
        $dataIndiceMorosidad12 = array();
        $dataIndiceMorosidad13 = array();

        $dataIngresosCobranzaAcumulado = array();
        $dataCobranzaDeudaMorosa = array();
        $dataCobranzaClasificacion = array();
        $dataCobranzaClasificacionVencida = array();
        $dataCobranzaClasificacionxVencer = array();
        $dataIngresosCobranzaDiario = array();

        $j =0;
        foreach ($raw1 as $item){
            $dataIndiceMorosidad00['fecha'][$j] = date_create($item->fecha)->format('d-m');
            $dataIndiceMorosidad00['indice'][$j] = round((double)$item->Indice,0);
            $dataIndiceMorosidad00['total'][$j] = round((double)$item->TotalPendiente/1000, 0);
            $dataIndiceMorosidad00['objetivo'][$j] = round((double)$item->Objetivo, 0);
            $j++;
        }

        $j =0;
        foreach ($raw2 as $item){
            $dataIndiceMorosidad01['fecha'][$j] = date_create($item->fecha)->format('d-m');
            $dataIndiceMorosidad01['indice'][$j] = round((double)$item->Indice,0);
            $dataIndiceMorosidad01['total'][$j] = round((double)$item->TotalPendiente/1000, 0);
            $dataIndiceMorosidad01['objetivo'][$j] = round((double)$item->Objetivo, 0);
            $j++;
        }

        $j =0;
        foreach ($raw3 as $item){
            $dataIndiceMorosidad02['fecha'][$j] = date_create($item->fecha)->format('d-m');
            $dataIndiceMorosidad02['indice'][$j] = round((double)$item->Indice,0);
            $dataIndiceMorosidad02['total'][$j] = round((double)$item->TotalPendiente/1000, 0);
            $dataIndiceMorosidad02['objetivo'][$j] = round((double)$item->Objetivo, 0);
            $j++;
        }

        $j =0;
        foreach ($raw4 as $item){
            $dataIndiceMorosidad05['fecha'][$j] = date_create($item->fecha)->format('d-m');
            $dataIndiceMorosidad05['indice'][$j] = round((double)$item->Indice,0);
            $dataIndiceMorosidad05['total'][$j] = round((double)$item->TotalPendiente/1000, 0);
            $dataIndiceMorosidad05['objetivo'][$j] = round((double)$item->Objetivo, 0);
            $j++;
        }

        $j =0;
        foreach ($raw5 as $item){
            $dataIndiceMorosidad06['fecha'][$j] = date_create($item->fecha)->format('d-m');
            $dataIndiceMorosidad06['indice'][$j] = round((double)$item->Indice,0);
            $dataIndiceMorosidad06['total'][$j] = round((double)$item->TotalPendiente/1000, 0);
            $dataIndiceMorosidad06['objetivo'][$j] = round((double)$item->Objetivo, 0);
            $j++;
        }

        $j =0;
        foreach ($raw6 as $item){
            $dataIndiceMorosidad12['fecha'][$j] = date_create($item->fecha)->format('d-m');
            $dataIndiceMorosidad12['indice'][$j] = round((double)$item->Indice,0);
            $dataIndiceMorosidad12['total'][$j] = round((double)$item->TotalPendiente/1000, 0);
            $dataIndiceMorosidad12['objetivo'][$j] = round((double)$item->Objetivo, 0);
            $j++;
        }

        $j =0;
        foreach ($raw7 as $item){
            $dataIndiceMorosidad13['fecha'][$j] = date_create($item->fecha)->format('d-m');
            $dataIndiceMorosidad13['indice'][$j] = round((double)$item->Indice,0);
            $dataIndiceMorosidad13['total'][$j] = round((double)$item->TotalPendiente/1000, 0);
            $dataIndiceMorosidad13['objetivo'][$j] = round((double)$item->Objetivo, 0);
            $j++;
        }
//        dd($dataIndiceMorosidad00,$dataIndiceMorosidad01
//            ,$dataIndiceMorosidad02,$dataIndiceMorosidad05,$dataIndiceMorosidad06
//            ,$dataIndiceMorosidad12,$dataIndiceMorosidad13);


        $i =0;
        foreach ($raw18 as $item){
            $dataIngresosCobranzaAcumulado['fecha'][$i] = date_create($item->fecha)->format('d-m');//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataIngresosCobranzaAcumulado['monto'][$i] = round((double) $item->monto, 2, PHP_ROUND_HALF_UP);
            $i++;
        }

        $i =0;
        $dataCobranzaDeudaMorosa['total'] = 0;
        foreach ($raw19 as $item){
            $dataCobranzaDeudaMorosa['cliente'][$i] = $item->cliente;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataCobranzaDeudaMorosa['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataCobranzaDeudaMorosa['total'] += $item->monto;
            $i++;
        }
        $dataCobranzaDeudaMorosa['total'] =round((double)$dataCobranzaDeudaMorosa['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataCobranzaClasificacion['total'] = 0;
        foreach ($raw20 as $item){
            $dataCobranzaClasificacion['vencidaflag'][$i] = $item->vencidaflag;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataCobranzaClasificacion['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataCobranzaClasificacion['total'] += $item->monto;
            $i++;
        }
        $dataCobranzaClasificacion['total'] =round((double)$dataCobranzaClasificacion['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataCobranzaClasificacionVencida['total'] = 0;
        foreach ($raw21 as $item){
            $dataCobranzaClasificacionVencida['clasificacion'][$i] = $item->clasificacion;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataCobranzaClasificacionVencida['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataCobranzaClasificacionVencida['total'] += $item->monto;
            $i++;
        }
        $dataCobranzaClasificacionVencida['total'] =round((double)$dataCobranzaClasificacionVencida['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataCobranzaClasificacionxVencer['total'] = 0;
        foreach ($raw22 as $item){
            $dataCobranzaClasificacionxVencer['clasificacion'][$i] = $item->clasificacion;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataCobranzaClasificacionxVencer['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataCobranzaClasificacionxVencer['total'] += $item->monto;
            $i++;
        }
        $dataCobranzaClasificacionxVencer['total'] =round((double)$dataCobranzaClasificacionxVencer['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataIngresosCobranzaDiario['total'] = 0;
        foreach ($raw17 as $item){
            $dataIngresosCobranzaDiario['fecha'][$i] = date_create($item->fecha)->format('d-m');//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataIngresosCobranzaDiario['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataIngresosCobranzaDiario['total'] += $item->monto;
            $i++;
        }
        $dataIngresosCobranzaDiario['total'] =round((double)$dataIngresosCobranzaDiario['total'],0,PHP_ROUND_HALF_UP);


        return view ('Dashboard.Reportes.Administracion.creditoscobranzas',compact('startDate',
            'dataIndiceMorosidad00','dataIndiceMorosidad01','dataIndiceMorosidad02',
            'dataIndiceMorosidad05', 'dataIndiceMorosidad06',
            'dataIndiceMorosidad12', 'dataIndiceMorosidad13',
            'dataIndiceMorisidadDetalle00','dataIndiceMorisidadDetalle01','dataIndiceMorisidadDetalle02',
            'dataIndiceMorisidadDetalle05','dataIndiceMorisidadDetalle06','dataIndiceMorisidadDetalle12',
            'dataIndiceMorisidadDetalle13',
            'dataIngresosCobranzaAcumulado',
            'dataCobranzaDeudaMorosa','dataCobranzaClasificacion',
            'dataCobranzaClasificacionVencida','dataCobranzaClasificacionxVencer',
            'dataIngresosCobranzaDiario'

//            ,
//            'dataOrdenCompraServicioCantidadActual','dataOrdenCompraServicioCantidadPasado',
//            'dataOrdenCompraServicioMixActualOS','dataOrdenCompraServicioMixPasadoOS',
//            'dataOrdenCompraServicioMixActualOC','dataOrdenCompraServicioMixPasadoOC',
//            'dataPagosPendientes42','dataPagosClasificacion',
//            'dataPagosClasificacionxVencer','dataPagosClasificacionVencida',
//            'dataPagosClasificacionFlujoVencida','dataPagosClasificacionFlujoxVencer',
//            'dataPagosPendientes43'
        ));



    }


    public function finanzas(Request $request)
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

        $raw23 = DB::select("exec [DiamanteWeb].dbo.sp_data_SaldoCajaDiario '". Carbon::now()->addDays(-30)."', '".$startDate."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16,$raw17,$raw18,$raw19,$raw20,$raw21,$raw22,$raw23);

        $dataSaldoCajaDiario = array();

        $i =0;
        foreach ($raw23 as $item){
            $dataSaldoCajaDiario['fecha'][$i] = date_create($item->fecha)->format('d-m');//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataSaldoCajaDiario['monto'][$i] = round((double) $item->monto, 2, PHP_ROUND_HALF_UP);
            $i++;
        }

        return view ('Dashboard.Reportes.Administracion.finanzas',compact('startDate',
            'dataSaldoCajaDiario'
        ));



    }


    public function tesoreria(Request $request)
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

        $raw6 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionPendiente42 '".$startDate."'");
//        dd($startDate,$raw1,$raw2,$raw3,$raw4,$raw5,$raw6);
        $raw7 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacion '".$startDate."'");
        $raw8 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacionVencida '".$startDate."'");
        $raw9 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacionxVencer '".$startDate."'");
        $raw10 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacionDeuda '".$startDate."'");
        $raw11 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionPendiente43 '".$startDate."'");


        $dataPagosPendientes42 = array();
        $dataPagosPendientes43 = array();
        $dataPagosClasificacion = array();
        $dataPagosClasificacionVencida = array();
        $dataPagosClasificacionxVencer = array();
        $dataPagosClasificacionFlujoVencida = array();
        $dataPagosClasificacionFlujoxVencer = array();



        $i =0;
        $dataPagosPendientes42['total'] = 0;
        foreach ($raw6 as $item){
            $dataPagosPendientes42['proveedor'][$i] = $item->proveedor;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosPendientes42['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosPendientes42['total'] += $item->monto;
            $i++;
        }
        $dataPagosPendientes42['total'] =round((double)$dataPagosPendientes42['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataPagosClasificacion['total'] = 0;
        foreach ($raw7 as $item){
            $dataPagosClasificacion['vencidaflag'][$i] = $item->vencidaflag;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosClasificacion['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosClasificacion['total'] += $item->monto;
            $i++;
        }
        $dataPagosClasificacion['total'] =round((double)$dataPagosClasificacion['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataPagosClasificacionVencida['total'] = 0;
        foreach ($raw8 as $item){
            $dataPagosClasificacionVencida['clasificacion'][$i] = $item->clasificacion;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosClasificacionVencida['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosClasificacionVencida['total'] += $item->monto;
            $i++;
        }
        $dataPagosClasificacionVencida['total'] =round((double)$dataPagosClasificacionVencida['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataPagosClasificacionxVencer['total'] = 0;
        foreach ($raw9 as $item){
            $dataPagosClasificacionxVencer['clasificacion'][$i] = $item->clasificacion;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosClasificacionxVencer['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosClasificacionxVencer['total'] += $item->monto;
            $i++;
        }
        $dataPagosClasificacionxVencer['total'] =round((double)$dataPagosClasificacionxVencer['total'],0,PHP_ROUND_HALF_UP);


        $j =0;
        $k =0;

        $dataPagosClasificacionFlujoVencida['total'] = 0;
        foreach ($raw10 as $item){
            $dataPagosClasificacionFlujoVencida['total'] += $item->monto;
            if($item->vencidaflag == 'Vencida') {

                $dataPagosClasificacionFlujoVencida['monto'][$j] = round((double)$item->monto, 0, PHP_ROUND_HALF_UP);
                $dataPagosClasificacionFlujoVencida['flujo'][$j] = $item->flujoagrupador;
                $dataPagosClasificacionFlujoVencida['vencidaflag'] = $item->vencidaflag;
                $j++;
            }
            else{
                $dataPagosClasificacionFlujoxVencer['monto'][$k] = round((double)$item->monto, 0, PHP_ROUND_HALF_UP);
                $dataPagosClasificacionFlujoxVencer['flujo'][$k] = $item->flujoagrupador;
                $dataPagosClasificacionFlujoxVencer['vencidaflag'] = $item->vencidaflag;
                $k++;
            }
        }
        $dataPagosClasificacionFlujoVencida['total'] =round((double)$dataPagosClasificacionFlujoVencida['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataPagosPendientes43['total'] = 0;
        foreach ($raw11 as $item){
            $dataPagosPendientes43['proveedor'][$i] = $item->proveedor;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataPagosPendientes43['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataPagosPendientes43['total'] += $item->monto;
            $i++;
        }
        $dataPagosPendientes43['total'] =round((double)$dataPagosPendientes43['total'],0,PHP_ROUND_HALF_UP);

        return view ('Dashboard.Reportes.Administracion.tesoreria',compact('startDate',
            'dataPagosPendientes42','dataPagosClasificacion',
            'dataPagosClasificacionxVencer','dataPagosClasificacionVencida',
            'dataPagosClasificacionFlujoVencida','dataPagosClasificacionFlujoxVencer',
            'dataPagosPendientes43'
        ));



    }


    public function desarrollohumano(Request $request)
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

        $raw6 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceRotacionPersonal '".$startDate."', 'ALL'");
        $raw7 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceRotacionPersonal '".$startDate."', 'OB'");
        $raw8 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceRotacionPersonal '".$startDate."', 'EM'");

        $raw9 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceAusentismo '".$startDate."', 'ALL'");
        $raw10 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceAusentismo '".$startDate."', 'OB'");
        $raw11 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceAusentismo '".$startDate."', 'EM'");

        $raw12 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceDescansoMedico '".$startDate."', 'ALL'");
        $raw13 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceDescansoMedico '".$startDate."', 'OB'");
        $raw14 = DB::select("exec [DiamanteWeb].dbo.sp_data_IndiceDescansoMedico '".$startDate."', 'EM'");
//        dd($raw6,$raw7,$raw8);
//        dd($startDate,$raw1,$raw2,$raw3,$raw4,$raw5,$raw6);
//        $raw7 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacion '".$startDate."'");
//        $raw8 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacionVencida '".$startDate."'");
//        $raw9 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacionxVencer '".$startDate."'");
//        $raw10 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionClasificacionDeuda '".$startDate."'");
//        $raw11 = DB::select("exec [DiamanteWeb].dbo.sp_data_ObligacionPendiente43 '".$startDate."'");
//
//
        $dataIndiceRotacionPersonalGeneralActual = array();
        $dataIndiceRotacionPersonalObreroActual = array();
        $dataIndiceRotacionPersonalEmpleadoActual = array();
        $dataIndiceRotacionPersonalGeneralPasado = array();
        $dataIndiceRotacionPersonalObreroPasado = array();
        $dataIndiceRotacionPersonalEmpleadoPasado = array();
        $dataIndiceRotacionPersonalGeneralPasado2 = array();
        $dataIndiceRotacionPersonalObreroPasado2 = array();
        $dataIndiceRotacionPersonalEmpleadoPasado2 = array();


        $dataIndiceAusentismoGeneralActual = array();
        $dataIndiceAusentismoObreroActual = array();
        $dataIndiceAusentismoEmpleadoActual = array();
        $dataIndiceAusentismoGeneralPasado = array();
        $dataIndiceAusentismoObreroPasado = array();
        $dataIndiceAusentismoEmpleadoPasado = array();
        $dataIndiceAusentismoGeneralPasado2 = array();
        $dataIndiceAusentismoObreroPasado2 = array();
        $dataIndiceAusentismoEmpleadoPasado2 = array();


        $dataIndiceDescansoMedicoGeneralActual = array();
        $dataIndiceDescansoMedicoObreroActual = array();
        $dataIndiceDescansoMedicoEmpleadoActual = array();
        $dataIndiceDescansoMedicoGeneralPasado = array();
        $dataIndiceDescansoMedicoObreroPasado = array();
        $dataIndiceDescansoMedicoEmpleadoPasado = array();
        $dataIndiceDescansoMedicoGeneralPasado2 = array();
        $dataIndiceDescansoMedicoObreroPasado2 = array();
        $dataIndiceDescansoMedicoEmpleadoPasado2 = array();

        $j =0;
        $k =0;
        $l =0;

//        $dataIndiceRotacionPersonalGeneral['total'] = 0;
        foreach ($raw6 as $item){
//            $dataPagosClasificacionFlujoVencida['total'] += $item->monto;
            if(substr($item->periodo,0,4) == $startDate->year) {
                $dataIndiceRotacionPersonalGeneralActual['nombre'] = 'General';
                $dataIndiceRotacionPersonalGeneralActual['indice'][$j] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                $dataIndiceRotacionPersonalGeneralActual['año'] = substr($item->periodo,0,4);
                $dataIndiceRotacionPersonalGeneralActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            else{
                if(substr($item->periodo,0,4) == ($startDate->year-1)) {
                    $dataIndiceRotacionPersonalGeneralPasado['año']= substr($item->periodo,0,4);
                    $dataIndiceRotacionPersonalGeneralPasado['indice'][$k] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceRotacionPersonalGeneralPasado['mes'][$k] = $item->mesdescripcion;
                    $k++;
                }
                else{
                    $dataIndiceRotacionPersonalGeneralPasado2['año'] = substr($item->periodo,0,4);
                    $dataIndiceRotacionPersonalGeneralPasado2['indice'][$l] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceRotacionPersonalGeneralPasado2['mes'][$l] = $item->mesdescripcion;
                    $l++;
                }
            }

        }
//        dd($dataIndiceRotacionPersonalGeneralActual,$dataIndiceRotacionPersonalGeneralPasado2,$dataIndiceRotacionPersonalGeneralPasado2);

        $j =0;
        $k =0;
        $l =0;

//        $dataIndiceRotacionPersonalGeneral['total'] = 0;
        foreach ($raw7 as $item){
//            $dataPagosClasificacionFlujoVencida['total'] += $item->monto;
            if(substr($item->periodo,0,4) == $startDate->year) {
                $dataIndiceRotacionPersonalObreroActual['nombre'] = 'General';
                $dataIndiceRotacionPersonalObreroActual['indice'][$j] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                $dataIndiceRotacionPersonalObreroActual['año'] = substr($item->periodo,0,4);
                $dataIndiceRotacionPersonalObreroActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            else{
                if(substr($item->periodo,0,4) == ($startDate->year-1)) {
                    $dataIndiceRotacionPersonalObreroPasado['año']= substr($item->periodo,0,4);
                    $dataIndiceRotacionPersonalObreroPasado['indice'][$k] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceRotacionPersonalObreroPasado['mes'][$k] = $item->mesdescripcion;
                    $k++;
                }
                else{
                    $dataIndiceRotacionPersonalObreroPasado2['año'] = substr($item->periodo,0,4);
                    $dataIndiceRotacionPersonalObreroPasado2['indice'][$l] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceRotacionPersonalObreroPasado2['mes'][$l] = $item->mesdescripcion;
                    $l++;
                }
            }

        }

        $j =0;
        $k =0;
        $l =0;

//        $dataIndiceRotacionPersonalGeneral['total'] = 0;
        foreach ($raw8 as $item){
//            $dataPagosClasificacionFlujoVencida['total'] += $item->monto;
            if(substr($item->periodo,0,4) == $startDate->year) {
                $dataIndiceRotacionPersonalEmpleadoActual['nombre'] = 'General';
                $dataIndiceRotacionPersonalEmpleadoActual['indice'][$j] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                $dataIndiceRotacionPersonalEmpleadoActual['año'] = substr($item->periodo,0,4);
                $dataIndiceRotacionPersonalEmpleadoActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            else{
                if(substr($item->periodo,0,4) == ($startDate->year-1)) {
                    $dataIndiceRotacionPersonalEmpleadoPasado['año']= substr($item->periodo,0,4);
                    $dataIndiceRotacionPersonalEmpleadoPasado['indice'][$k] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceRotacionPersonalEmpleadoPasado['mes'][$k] = $item->mesdescripcion;
                    $k++;
                }
                else{
                    $dataIndiceRotacionPersonalEmpleadoPasado2['año'] = substr($item->periodo,0,4);
                    $dataIndiceRotacionPersonalEmpleadoPasado2['indice'][$l] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceRotacionPersonalEmpleadoPasado2['mes'][$l] = $item->mesdescripcion;
                    $l++;
                }
            }

        }



        $j =0;
        $k =0;
        $l =0;

//        $dataIndiceAusentismoGeneral['total'] = 0;
        foreach ($raw9 as $item){
//            $dataPagosClasificacionFlujoVencida['total'] += $item->monto;
            if(substr($item->periodo,0,4) == $startDate->year) {
                $dataIndiceAusentismoGeneralActual['nombre'] = 'General';
                $dataIndiceAusentismoGeneralActual['indice'][$j] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                $dataIndiceAusentismoGeneralActual['año'] = substr($item->periodo,0,4);
                $dataIndiceAusentismoGeneralActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            else{
                if(substr($item->periodo,0,4) == ($startDate->year-1)) {
                    $dataIndiceAusentismoGeneralPasado['año']= substr($item->periodo,0,4);
                    $dataIndiceAusentismoGeneralPasado['indice'][$k] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceAusentismoGeneralPasado['mes'][$k] = $item->mesdescripcion;
                    $k++;
                }
                else{
                    $dataIndiceAusentismoGeneralPasado2['año'] = substr($item->periodo,0,4);
                    $dataIndiceAusentismoGeneralPasado2['indice'][$l] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceAusentismoGeneralPasado2['mes'][$l] = $item->mesdescripcion;
                    $l++;
                }
            }

        }
//        dd($dataIndiceAusentismoGeneralActual,$dataIndiceAusentismoGeneralPasado2,$dataIndiceAusentismoGeneralPasado2);

        $j =0;
        $k =0;
        $l =0;

//        $dataIndiceAusentismoGeneral['total'] = 0;
        foreach ($raw10 as $item){
//            $dataPagosClasificacionFlujoVencida['total'] += $item->monto;
            if(substr($item->periodo,0,4) == $startDate->year) {
                $dataIndiceAusentismoObreroActual['nombre'] = 'General';
                $dataIndiceAusentismoObreroActual['indice'][$j] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                $dataIndiceAusentismoObreroActual['año'] = substr($item->periodo,0,4);
                $dataIndiceAusentismoObreroActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            else{
                if(substr($item->periodo,0,4) == ($startDate->year-1)) {
                    $dataIndiceAusentismoObreroPasado['año']= substr($item->periodo,0,4);
                    $dataIndiceAusentismoObreroPasado['indice'][$k] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceAusentismoObreroPasado['mes'][$k] = $item->mesdescripcion;
                    $k++;
                }
                else{
                    $dataIndiceAusentismoObreroPasado2['año'] = substr($item->periodo,0,4);
                    $dataIndiceAusentismoObreroPasado2['indice'][$l] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceAusentismoObreroPasado2['mes'][$l] = $item->mesdescripcion;
                    $l++;
                }
            }

        }

        $j =0;
        $k =0;
        $l =0;

//        $dataIndiceAusentismoGeneral['total'] = 0;
        foreach ($raw11 as $item){
//            $dataPagosClasificacionFlujoVencida['total'] += $item->monto;
            if(substr($item->periodo,0,4) == $startDate->year) {
                $dataIndiceAusentismoEmpleadoActual['nombre'] = 'General';
                $dataIndiceAusentismoEmpleadoActual['indice'][$j] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                $dataIndiceAusentismoEmpleadoActual['año'] = substr($item->periodo,0,4);
                $dataIndiceAusentismoEmpleadoActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            else{
                if(substr($item->periodo,0,4) == ($startDate->year-1)) {
                    $dataIndiceAusentismoEmpleadoPasado['año']= substr($item->periodo,0,4);
                    $dataIndiceAusentismoEmpleadoPasado['indice'][$k] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceAusentismoEmpleadoPasado['mes'][$k] = $item->mesdescripcion;
                    $k++;
                }
                else{
                    $dataIndiceAusentismoEmpleadoPasado2['año'] = substr($item->periodo,0,4);
                    $dataIndiceAusentismoEmpleadoPasado2['indice'][$l] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceAusentismoEmpleadoPasado2['mes'][$l] = $item->mesdescripcion;
                    $l++;
                }
            }

        }


        $j =0;
        $k =0;
        $l =0;

//        $dataIndiceDescansoMedicoGeneral['total'] = 0;
        foreach ($raw12 as $item){
//            $dataPagosClasificacionFlujoVencida['total'] += $item->monto;
            if(substr($item->periodo,0,4) == $startDate->year) {
                $dataIndiceDescansoMedicoGeneralActual['nombre'] = 'General';
                $dataIndiceDescansoMedicoGeneralActual['indice'][$j] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                $dataIndiceDescansoMedicoGeneralActual['año'] = substr($item->periodo,0,4);
                $dataIndiceDescansoMedicoGeneralActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            else{
                if(substr($item->periodo,0,4) == ($startDate->year-1)) {
                    $dataIndiceDescansoMedicoGeneralPasado['año']= substr($item->periodo,0,4);
                    $dataIndiceDescansoMedicoGeneralPasado['indice'][$k] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceDescansoMedicoGeneralPasado['mes'][$k] = $item->mesdescripcion;
                    $k++;
                }
                else{
                    $dataIndiceDescansoMedicoGeneralPasado2['año'] = substr($item->periodo,0,4);
                    $dataIndiceDescansoMedicoGeneralPasado2['indice'][$l] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceDescansoMedicoGeneralPasado2['mes'][$l] = $item->mesdescripcion;
                    $l++;
                }
            }

        }
//        dd($dataIndiceDescansoMedicoGeneralActual,$dataIndiceDescansoMedicoGeneralPasado2,$dataIndiceDescansoMedicoGeneralPasado2);

        $j =0;
        $k =0;
        $l =0;

//        $dataIndiceDescansoMedicoGeneral['total'] = 0;
        foreach ($raw13 as $item){
//            $dataPagosClasificacionFlujoVencida['total'] += $item->monto;
            if(substr($item->periodo,0,4) == $startDate->year) {
                $dataIndiceDescansoMedicoObreroActual['nombre'] = 'General';
                $dataIndiceDescansoMedicoObreroActual['indice'][$j] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                $dataIndiceDescansoMedicoObreroActual['año'] = substr($item->periodo,0,4);
                $dataIndiceDescansoMedicoObreroActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            else{
                if(substr($item->periodo,0,4) == ($startDate->year-1)) {
                    $dataIndiceDescansoMedicoObreroPasado['año']= substr($item->periodo,0,4);
                    $dataIndiceDescansoMedicoObreroPasado['indice'][$k] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceDescansoMedicoObreroPasado['mes'][$k] = $item->mesdescripcion;
                    $k++;
                }
                else{
                    $dataIndiceDescansoMedicoObreroPasado2['año'] = substr($item->periodo,0,4);
                    $dataIndiceDescansoMedicoObreroPasado2['indice'][$l] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceDescansoMedicoObreroPasado2['mes'][$l] = $item->mesdescripcion;
                    $l++;
                }
            }

        }

        $j =0;
        $k =0;
        $l =0;

//        $dataIndiceDescansoMedicoGeneral['total'] = 0;
        foreach ($raw14 as $item){
//            $dataPagosClasificacionFlujoVencida['total'] += $item->monto;
            if(substr($item->periodo,0,4) == $startDate->year) {
                $dataIndiceDescansoMedicoEmpleadoActual['nombre'] = 'General';
                $dataIndiceDescansoMedicoEmpleadoActual['indice'][$j] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                $dataIndiceDescansoMedicoEmpleadoActual['año'] = substr($item->periodo,0,4);
                $dataIndiceDescansoMedicoEmpleadoActual['mes'][$j] = $item->mesdescripcion;
                $j++;
            }
            else{
                if(substr($item->periodo,0,4) == ($startDate->year-1)) {
                    $dataIndiceDescansoMedicoEmpleadoPasado['año']= substr($item->periodo,0,4);
                    $dataIndiceDescansoMedicoEmpleadoPasado['indice'][$k] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceDescansoMedicoEmpleadoPasado['mes'][$k] = $item->mesdescripcion;
                    $k++;
                }
                else{
                    $dataIndiceDescansoMedicoEmpleadoPasado2['año'] = substr($item->periodo,0,4);
                    $dataIndiceDescansoMedicoEmpleadoPasado2['indice'][$l] = round((double)$item->indice, 2, PHP_ROUND_HALF_UP);
                    $dataIndiceDescansoMedicoEmpleadoPasado2['mes'][$l] = $item->mesdescripcion;
                    $l++;
                }
            }

        }


//        dd($dataIndiceAusentismoGeneralActual,$dataIndiceAusentismoGeneralPasado,$dataIndiceAusentismoGeneralPasado2);

//        dd($dataIndiceDescansoMedicoGeneralActual,$dataIndiceDescansoMedicoGeneralPasado,$dataIndiceDescansoMedicoGeneralPasado2);
//        $dataPagosClasificacionFlujoVencida['total'] =round((double)$dataPagosClasificacionFlujoVencida['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataPagosPendientes43['total'] = 0;
//        foreach ($raw11 as $item){
//            $dataPagosPendientes43['proveedor'][$i] = $item->proveedor;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataPagosPendientes43['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
//            $dataPagosPendientes43['total'] += $item->monto;
//            $i++;
//        }
//        $dataPagosPendientes43['total'] =round((double)$dataPagosPendientes43['total'],0,PHP_ROUND_HALF_UP);

        return view ('Dashboard.Reportes.Administracion.rrhh',compact(
            'startDate',
            'dataIndiceRotacionPersonalGeneralActual',
        'dataIndiceRotacionPersonalObreroActual',
        'dataIndiceRotacionPersonalEmpleadoActual',
        'dataIndiceRotacionPersonalGeneralPasado',
        'dataIndiceRotacionPersonalObreroPasado',
        'dataIndiceRotacionPersonalEmpleadoPasado',
        'dataIndiceRotacionPersonalGeneralPasado2',
        'dataIndiceRotacionPersonalObreroPasado2',
        'dataIndiceRotacionPersonalEmpleadoPasado2',

            'dataIndiceAusentismoGeneralActual',
            'dataIndiceAusentismoObreroActual',
            'dataIndiceAusentismoEmpleadoActual',
            'dataIndiceAusentismoGeneralPasado',
            'dataIndiceAusentismoObreroPasado',
            'dataIndiceAusentismoEmpleadoPasado',
            'dataIndiceAusentismoGeneralPasado2',
            'dataIndiceAusentismoObreroPasado2',
            'dataIndiceAusentismoEmpleadoPasado2',

            'dataIndiceDescansoMedicoGeneralActual',
        'dataIndiceDescansoMedicoObreroActual',
        'dataIndiceDescansoMedicoEmpleadoActual',
        'dataIndiceDescansoMedicoGeneralPasado',
        'dataIndiceDescansoMedicoObreroPasado',
        'dataIndiceDescansoMedicoEmpleadoPasado',
        'dataIndiceDescansoMedicoGeneralPasado2',
        'dataIndiceDescansoMedicoObreroPasado2',
        'dataIndiceDescansoMedicoEmpleadoPasado2'

//            'dataPagosPendientes42','dataPagosClasificacion',
//            'dataPagosClasificacionxVencer','dataPagosClasificacionVencida',
//            'dataPagosClasificacionFlujoVencida','dataPagosClasificacionFlujoxVencer',
//            'dataPagosPendientes43'
        ));



    }


}

