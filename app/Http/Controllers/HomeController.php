<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;
use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $diasatraso = -1;
        $startDate = Carbon::now()->addDays($diasatraso);
        $firstDay = Carbon::now()->addDays($diasatraso)->startOfMonth();
        $lastDay = Carbon::now()->addDays($diasatraso)->lastOfMonth();


        $raw1 = DB::select("exec [DiamanteWeb].dbo.sp_data_DescargaHorno '".$firstDay."', '".$lastDay."'");
        $raw2 = DB::select("exec [DiamanteWeb].dbo.sp_data_ProduccionNetaPlanta '".$firstDay."', '".$lastDay."'");
        $raw3 = DB::select("exec [DiamanteWeb].dbo.sp_data_RatioGasConSecadero '".$firstDay."', '".$lastDay."'");
        $raw4 = DB::select("exec [DiamanteWeb].dbo.sp_data_RatioGasSinSecadero '".$firstDay."', '".$lastDay."'");
        $raw5 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoDiarioMillar '".$firstDay."', '".$lastDay."'");
        $raw6 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoDiarioSoles '".$firstDay."', '".$lastDay."'");
//        $raw7 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoTotalTipoPago '".$firstDay."', '".$lastDay."'");
//        $raw8 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoTotalTipoItem '".$firstDay."', '".$lastDay."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8);
//        $raw9 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoTotalTipoCliente '".$firstDay."', '".$lastDay."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9);
//        $raw10 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoTotalUnidadNegocio '".$firstDay."', '".$lastDay."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10);
//        $raw11 = DB::select("exec [DiamanteWeb].dbo.sp_data_StockTotalCalidad '".$firstDay."', '".$lastDay."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11);
//        $raw12 = DB::select("exec [DiamanteWeb].dbo.sp_data_StockTotalTipoItem '".$firstDay."', '".$lastDay."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12);
//        $raw13 = DB::select("exec [DiamanteWeb].dbo.sp_data_StockTotalAlmacen '".$firstDay."', '".$lastDay."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13);
//        $raw14 = DB::select("exec [DiamanteWeb].dbo.sp_data_StockFamiliaEstructural '".$firstDay."', '".$lastDay."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14);
//        $raw15 = DB::select("exec [DiamanteWeb].dbo.sp_data_StockFamiliaTabiqueria '".$firstDay."', '".$lastDay."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15);
//        $raw16 = DB::select("exec [DiamanteWeb].dbo.sp_data_StockFamiliaParaTecho '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16);
        $raw17 = DB::select("exec [DiamanteWeb].dbo.sp_data_IngresosCobranzaDiario '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16,$raw17);
//        $raw18 = DB::select("exec [DiamanteWeb].dbo.sp_data_IngresosCobranzaAcumulado '".$firstDay."', '".$lastDay."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16,$raw17,$raw18);
//        $raw19 = DB::select("exec [DiamanteWeb].dbo.sp_data_CobranzaDeudaMorosa '".$firstDay."', '".$lastDay."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16,$raw17,$raw18,$raw19);
//        $raw20 = DB::select("exec [DiamanteWeb].dbo.sp_data_CobranzaClasificacion '".$firstDay."', '".$lastDay."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16,$raw17,$raw18,$raw19,$raw20);
//        $raw21 = DB::select("exec [DiamanteWeb].dbo.sp_data_CobranzaClasificacionVencida '".$firstDay."', '".$lastDay."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16,$raw17,$raw18,$raw19,$raw20,$raw21);
//        $raw22 = DB::select("exec [DiamanteWeb].dbo.sp_data_CobranzaClasificacionxVencer '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16,$raw17,$raw18,$raw19,$raw20,$raw21,$raw22);
//        $raw23 = DB::select("exec [DiamanteWeb].dbo.sp_data_SaldoCajaDiario '". Carbon::now()->addDays(-30)."', '".$startDate."'");
////        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10,$raw11,$raw12,$raw13,$raw14,$raw15,$raw16,$raw17,$raw18,$raw19,$raw20,$raw21,$raw22,$raw23);


        $dataDescargaHorno = array();
        $dataProduccionNetaPlanta = array();
        $dataRatioGasConSecadero = array();
        $dataRatioGasSinSecadero = array();
        $dataDespachoDiaroMillar = array();
        $dataDespachoDiaroSoles = array();
//        $dataDespachoTotalTipoPago = array();
//        $dataDespachoTotalTipoItem = array();
//        $dataDespachoTotalTipoCliente = array();
//        $dataDespachoTotalUnidadNegocio = array();
//        $dataStockTotalCalidad = array();
//        $dataStockTotalTipoItem = array();
//        $dataStockTotalAlmacen = array();
//        $dataStockFamiliaEstructural = array();
//        $dataStockFamiliaTabiqueria = array();
//        $dataStockFamiliaParaTecho = array();
        $dataIngresosCobranzaDiario = array();
//        $dataIngresosCobranzaAcumulado = array();
//        $dataCobranzaDeudaMorosa = array();
//        $dataCobranzaClasificacion = array();
//        $dataCobranzaClasificacionVencida = array();
//        $dataCobranzaClasificacionxVencer = array();
//        $dataSaldoCajaDiario = array();

        $i =0;
        $dataDescargaHorno['total'] = 0;
        foreach ($raw1 as $item){
            $dataDescargaHorno['fecha'][$i] = date_create($item->fecha)->format('d-m');
            $dataDescargaHorno['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);;
            $dataDescargaHorno['total'] += $item->cantidad;
            $i++;
        }
        $dataDescargaHorno['total'] =round((double)$dataDescargaHorno['total'],0,PHP_ROUND_HALF_UP);


        $i =0;
        $dataProduccionNetaPlanta['total'] = 0;
        foreach ($raw2 as $item){
            $dataProduccionNetaPlanta['fecha'][$i] = date_create($item->fecha)->format('d-m');
            $dataProduccionNetaPlanta['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataProduccionNetaPlanta['total'] += $item->cantidad;
            $i++;
        }
        $dataProduccionNetaPlanta['total'] =round((double)$dataProduccionNetaPlanta['total'],0,PHP_ROUND_HALF_UP);


        $i =0;
        foreach ($raw3 as $item){
            $dataRatioGasConSecadero['fecha'][$i] = date_create($item->fecha)->format('d-m');
            $dataRatioGasConSecadero['ratio'][$i] = round((double) $item->ratio, 2, PHP_ROUND_HALF_UP);
            $dataRatioGasConSecadero['meta'][$i] = 28;
            $i++;
        }

        $i =0;
        foreach ($raw4 as $item){
            $dataRatioGasSinSecadero['fecha'][$i] = date_create($item->fecha)->format('d-m');
            $dataRatioGasSinSecadero['ratio'][$i] = round((double) $item->ratio, 2, PHP_ROUND_HALF_UP);
            $i++;
        }

        $i =0;
        $dataDespachoDiaroMillar['total'] = 0;
        foreach ($raw5 as $item){
            $dataDespachoDiaroMillar['fecha'][$i] = date_create($item->fecha)->format('d-m');
            $dataDespachoDiaroMillar['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataDespachoDiaroMillar['total'] += $item->cantidad;
            $i++;
        }
        $dataDespachoDiaroMillar['total'] =round((double)$dataDespachoDiaroMillar['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataDespachoDiaroSoles['total'] = 0;
        foreach ($raw6 as $item){
            $dataDespachoDiaroSoles['fecha'][$i] = date_create($item->fecha)->format('d-m');
            $dataDespachoDiaroSoles['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataDespachoDiaroSoles['total'] += $item->cantidad;
            $i++;
        }
        $dataDespachoDiaroSoles['total'] =round((double)$dataDespachoDiaroSoles['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataDespachoTotalTipoPago['total'] = 0;
//        foreach ($raw7 as $item){
//            $dataDespachoTotalTipoPago['formapago'][$i] = $item->formapago;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).'k S/.';
//            $dataDespachoTotalTipoPago['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
//            $dataDespachoTotalTipoPago['total'] += $item->cantidad;
//            $i++;
//        }
//        $dataDespachoTotalTipoPago['total'] =round((double)$dataDespachoTotalTipoPago['total'],0,PHP_ROUND_HALF_UP);
//
//
//        $i =0;
//        $dataDespachoTotalTipoItem['total'] = 0;
//        foreach ($raw8 as $item){
//            $dataDespachoTotalTipoItem['familia'][$i] = $item->familia;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataDespachoTotalTipoItem['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
//            $dataDespachoTotalTipoItem['total'] += $item->cantidad;
//            $i++;
//        }
//        $dataDespachoTotalTipoItem['total'] =round((double)$dataDespachoTotalTipoItem['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataDespachoTotalTipoCliente['total'] = 0;
//        foreach ($raw9 as $item){
//            $dataDespachoTotalTipoCliente['tipocliente'][$i] = $item->tipocliente;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataDespachoTotalTipoCliente['cantidad'][$i] = round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP);
//            $dataDespachoTotalTipoCliente['total'] += $item->cantidad;
//            $i++;
//        }
//        $dataDespachoTotalTipoCliente['total'] =round((double)$dataDespachoTotalTipoCliente['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataDespachoTotalUnidadNegocio['total'] = 0;
//        foreach ($raw10 as $item){
//            $dataDespachoTotalUnidadNegocio['unidadnegocio'][$i] = $item->unidadnegocio;
//            $dataDespachoTotalUnidadNegocio['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
//            $dataDespachoTotalUnidadNegocio['total'] += $item->cantidad;
//            $i++;
//        }
//        $dataDespachoTotalUnidadNegocio['total'] =round((double)$dataDespachoTotalUnidadNegocio['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataStockTotalCalidad['total'] = 0;
//        foreach ($raw11 as $item){
//            $dataStockTotalCalidad['calidad'][$i] = $item->calidad;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataStockTotalCalidad['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
//            $dataStockTotalCalidad['total'] += $item->cantidad;
//            $i++;
//        }
//        $dataStockTotalCalidad['total'] =round((double)$dataStockTotalCalidad['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataStockTotalTipoItem['total'] = 0;
//        foreach ($raw12 as $item){
//            $dataStockTotalTipoItem['familia'][$i] = $item->familia;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataStockTotalTipoItem['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
//            $dataStockTotalTipoItem['total'] += $item->cantidad;
//            $i++;
//        }
//        $dataStockTotalTipoItem['total'] =round((double)$dataStockTotalTipoItem['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataStockTotalAlmacen['total'] = 0;
//        foreach ($raw13 as $item){
//            $dataStockTotalAlmacen['almacen'][$i] = $item->almacen;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataStockTotalAlmacen['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
//            $dataStockTotalAlmacen['total'] += $item->cantidad;
//            $i++;
//        }
//        $dataStockTotalAlmacen['total'] =round((double)$dataStockTotalAlmacen['total'],0,PHP_ROUND_HALF_UP);
//
//
//        $i =0;
//        $dataStockFamiliaEstructural['total'] = 0;
//        foreach ($raw14 as $item){
//            $dataStockFamiliaEstructural['item'][$i] = $item->item;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataStockFamiliaEstructural['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
//            $dataStockFamiliaEstructural['total'] += $item->cantidad;
//            $i++;
//        }
//        $dataStockFamiliaEstructural['total'] =round((double)$dataStockFamiliaEstructural['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataStockFamiliaTabiqueria['total'] = 0;
//        foreach ($raw15 as $item){
//            $dataStockFamiliaTabiqueria['item'][$i] = $item->item;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataStockFamiliaTabiqueria['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
//            $dataStockFamiliaTabiqueria['total'] += $item->cantidad;
//            $i++;
//        }
//        $dataStockFamiliaTabiqueria['total'] =round((double)$dataStockFamiliaTabiqueria['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataStockFamiliaParaTecho['total'] = 0;
//        foreach ($raw16 as $item){
//            $dataStockFamiliaParaTecho['item'][$i] = $item->item;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataStockFamiliaParaTecho['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
//            $dataStockFamiliaParaTecho['total'] += $item->cantidad;
//            $i++;
//        }
//        $dataStockFamiliaParaTecho['total'] =round((double)$dataStockFamiliaParaTecho['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataIngresosCobranzaDiario['total'] = 0;
        foreach ($raw17 as $item){
            $dataIngresosCobranzaDiario['fecha'][$i] = date_create($item->fecha)->format('d-m');//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataIngresosCobranzaDiario['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
            $dataIngresosCobranzaDiario['total'] += $item->monto;
            $i++;
        }
        $dataIngresosCobranzaDiario['total'] =round((double)$dataIngresosCobranzaDiario['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        foreach ($raw18 as $item){
//            $dataIngresosCobranzaAcumulado['fecha'][$i] = date_create($item->fecha)->format('d-m');//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataIngresosCobranzaAcumulado['monto'][$i] = round((double) $item->monto, 2, PHP_ROUND_HALF_UP);
//            $i++;
//        }
//
//        $i =0;
//        $dataCobranzaDeudaMorosa['total'] = 0;
//        foreach ($raw19 as $item){
//            $dataCobranzaDeudaMorosa['cliente'][$i] = $item->cliente;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataCobranzaDeudaMorosa['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
//            $dataCobranzaDeudaMorosa['total'] += $item->monto;
//            $i++;
//        }
//        $dataCobranzaDeudaMorosa['total'] =round((double)$dataCobranzaDeudaMorosa['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataCobranzaClasificacion['total'] = 0;
//        foreach ($raw20 as $item){
//            $dataCobranzaClasificacion['vencidaflag'][$i] = $item->vencidaflag;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataCobranzaClasificacion['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
//            $dataCobranzaClasificacion['total'] += $item->monto;
//            $i++;
//        }
//        $dataCobranzaClasificacion['total'] =round((double)$dataCobranzaClasificacion['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataCobranzaClasificacionVencida['total'] = 0;
//        foreach ($raw21 as $item){
//            $dataCobranzaClasificacionVencida['clasificacion'][$i] = $item->clasificacion;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataCobranzaClasificacionVencida['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
//            $dataCobranzaClasificacionVencida['total'] += $item->monto;
//            $i++;
//        }
//        $dataCobranzaClasificacionVencida['total'] =round((double)$dataCobranzaClasificacionVencida['total'],0,PHP_ROUND_HALF_UP);
//
//        $i =0;
//        $dataCobranzaClasificacionxVencer['total'] = 0;
//        foreach ($raw22 as $item){
//            $dataCobranzaClasificacionxVencer['clasificacion'][$i] = $item->clasificacion;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataCobranzaClasificacionxVencer['monto'][$i] = round((double) $item->monto, 0, PHP_ROUND_HALF_UP);
//            $dataCobranzaClasificacionxVencer['total'] += $item->monto;
//            $i++;
//        }
//        $dataCobranzaClasificacionxVencer['total'] =round((double)$dataCobranzaClasificacionxVencer['total'],0,PHP_ROUND_HALF_UP);


//        $i =0;
//        foreach ($raw23 as $item){
//            $dataSaldoCajaDiario['fecha'][$i] = date_create($item->fecha)->format('d-m');//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
//            $dataSaldoCajaDiario['monto'][$i] = round((double) $item->monto, 2, PHP_ROUND_HALF_UP);
//            $i++;
//        }

        //$dataIngresosCobranzaAcumulado['total'] =round((double)$dataIngresosCobranzaAcumulado['total'],0,PHP_ROUND_HALF_UP);


        //dd($dataCobranzaClasificacionVencida);

        return view('Dashboard.home',
            compact('dataProduccionNetaPlanta','dataDescargaHorno',
                'dataRatioGasConSecadero','dataRatioGasSinSecadero',
                'dataDespachoDiaroMillar','dataDespachoDiaroSoles',

//                'dataStockTotalCalidad','dataStockTotalTipoItem',
//                'dataStockTotalAlmacen','dataStockFamiliaEstructural',
//                'dataStockFamiliaTabiqueria','dataStockFamiliaParaTecho',
                'dataIngresosCobranzaDiario',
//                'dataIngresosCobranzaAcumulado',
//                'dataCobranzaDeudaMorosa','dataCobranzaClasificacion',
//                'dataCobranzaClasificacionVencida','dataCobranzaClasificacionxVencer',
//                'dataSaldoCajaDiario',
                'startDate'
            ));
    }

    public function comercial()
    {
        $diasatraso = -1;
        $startDate = Carbon::now()->addDays($diasatraso);
        $firstDay = Carbon::now()->addDays($diasatraso)->startOfMonth();
        $lastDay = Carbon::now()->addDays($diasatraso)->lastOfMonth();

        $raw5 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoDiarioMillar '".$firstDay."', '".$lastDay."'");
        $raw6 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoDiarioSoles '".$firstDay."', '".$lastDay."'");

        $dataDespachoDiaroMillar = array();
        $dataDespachoDiaroSoles = array();

        $i =0;
        $dataDespachoDiaroMillar['total'] = 0;
        foreach ($raw5 as $item){
            $dataDespachoDiaroMillar['fecha'][$i] = date_create($item->fecha)->format('d-m');
            $dataDespachoDiaroMillar['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataDespachoDiaroMillar['total'] += $item->cantidad;
            $i++;
        }
        $dataDespachoDiaroMillar['total'] =round((double)$dataDespachoDiaroMillar['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataDespachoDiaroSoles['total'] = 0;
        foreach ($raw6 as $item){
            $dataDespachoDiaroSoles['fecha'][$i] = date_create($item->fecha)->format('d-m');
            $dataDespachoDiaroSoles['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataDespachoDiaroSoles['total'] += $item->cantidad;
            $i++;
        }
        $dataDespachoDiaroSoles['total'] =round((double)$dataDespachoDiaroSoles['total'],0,PHP_ROUND_HALF_UP);


        return view ('Dashboard.Reportes.comercial',compact('startDate',
            'dataDespachoDiaroMillar','dataDespachoDiaroSoles'));

    }

    public function getDataReporteDescargaHorno($periodo){
    //        SELECT wtra.fechadocumento fecha, sum(wdet.cantidad)  cantidad
    //	FROM [DiamanteWeb].[dbo].[WH_TransaccionHeader] wtra
    //	left join [DiamanteWeb].[dbo].wh_transacciondetalle wdet
    //	on wtra.numerodocumento = wdet.numerodocumento
    //        and wtra.tipodocumento = wdet.tipodocumento
    //	where wtra.periodo =  @Periodo
    //	group by wtra.fechadocumento
    //$periodo = date_create();
    $raw = DB::table('WH_TransaccionHeader')
    ->select('wh_transaccionHeader.fechadocumento as fecha',DB::raw('sum(wh_transacciondetalle.cantidad) as cantidad'))
    ->join('wh_transacciondetalle', function ($join) {
        $join->on('wh_transaccionHeader.numerodocumento', '=', 'wh_transacciondetalle.numerodocumento')
            ->on('wh_transaccionHeader.tipodocumento', '=', 'wh_transacciondetalle.tipodocumento');
    })
    ->join('wh_itemmast','wh_transacciondetalle.item','=','wh_itemmast.item')
    //            ->where('WH_TransaccionHeader.periodo',$periodo)
    ->whereYear('WH_TransaccionHeader.fechadocumento',$periodo->format('Y'))
    ->whereMonth('WH_TransaccionHeader.fechadocumento',$periodo->format('m'))
    ->where('wh_itemmast.itemtipo','=','PT')

    //            ->whereBetween(''.[$ini,$fin])
    ->groupBy('WH_TransaccionHeader.fechadocumento')
    //            ->sum('wh_transacciondetalle.cantidad')
    ->get();
    //        if()

    ;
    //        DB::raw('count(*) as user_count, status')


    return $raw;
    }
}
