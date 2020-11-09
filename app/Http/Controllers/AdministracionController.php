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


        return view ('Dashboard.Reportes.Administracion.creditoscobranzas',compact('startDate',
            'dataIndiceMorosidad00','dataIndiceMorosidad01','dataIndiceMorosidad02',
            'dataIndiceMorosidad05', 'dataIndiceMorosidad06',
            'dataIndiceMorosidad12', 'dataIndiceMorosidad13',
            'dataIndiceMorisidadDetalle00','dataIndiceMorisidadDetalle01','dataIndiceMorisidadDetalle02',
            'dataIndiceMorisidadDetalle05','dataIndiceMorisidadDetalle06','dataIndiceMorisidadDetalle12',
            'dataIndiceMorisidadDetalle13'

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


}

