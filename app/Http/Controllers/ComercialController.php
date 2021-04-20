<?php

namespace App\Http\Controllers;

use http\Params;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ComercialController extends Controller
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

    public function comercial(Request $request)
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





        $raw5 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoDiarioMillar '".$firstDay."', '".$lastDay."'");
        $raw6 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoDiarioSoles '".$firstDay."', '".$lastDay."'");
//        dd($startDate,$raw5,$raw6);
//        $firstDay = Carbon::now()->addDays(-1)->startOfMonth();
//        $lastDay = Carbon::now()->addDays(-1)->lastOfMonth();

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

//        dd($raw6,$dataDespachoDiaroSoles,
//            json_encode($dataDespachoDiaroSoles),json_encode($raw6));

        return view ('Dashboard.Reportes.comercial',compact('startDate',
            'dataDespachoDiaroMillar','dataDespachoDiaroSoles','raw6'          ));
    }


    public function ventas(Request $request)
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

        $raw1 = DB::select("exec [DiamanteWeb].dbo.sp_data_DescuentoMensual '".$startDate."'");

        $raw7 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoTotalTipoPago '".$firstDay."', '".$lastDay."'");
        $raw8 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoTotalTipoItem '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8);
        $raw9 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoTotalTipoCliente '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9);
        $raw10 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoTotalUnidadNegocio '".$firstDay."', '".$lastDay."'");
//        dd($raw1,$raw2,$raw3,$raw4,$raw5,$raw6,$raw7,$raw8,$raw9,$raw10);
        $raw11 = DB::select("exec [DiamanteWeb].dbo.sp_data_DescuentoTop '".$startDate."',6");



//        dd($raw11);
//        $dataDescuentoMensual00 = array();
        $dataDescuentoMensual01 = array();
        $dataDescuentoMensual02 = array();
        $dataDescuentoMensual05 = array();
        $dataDescuentoMensual06 = array();
        $dataDescuentoMensual07 = array();
        $dataDescuentoMensual12 = array();
        $dataDescuentoMensual13 = array();


        $dataDespachoTotalTipoPago = array();
        $dataDespachoTotalTipoItem = array();
        $dataDespachoTotalTipoCliente = array();
        $dataDespachoTotalUnidadNegocio = array();

        $dataDescuentoTopAñoActual = array();
        $dataDescuentoTopAñoPasado = array();
        $dataDescuentoTop3 = array();
        $dataDescuentoTop4 = array();
        $dataDescuentoTop5 = array();
        $dataDescuentoTop6 = array();

//        $i =0;
        $j =0; $k =0; $l =0; $m =0; $n =0; $o =0; $p=0;
        $dataDescuentoMensual01['total'] = 0;
        $dataDescuentoMensual01['totalcantidad'] = 0;
        foreach ($raw1 as $item){
//            var_dump($item);

            if((string)$item->tipocliente === '01' ) { //CF
                $dataDescuentoMensual01['montodesc'][$j] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual01['descripcion'] = $item->descripcion;
                $dataDescuentoMensual01['cantidad'][$j] = (int)$item->cantidad1;
                $dataDescuentoMensual01['mesdescripcion'][$j] = $item->mesdescripcion;
                $j++;
            }
            elseif((string)$item->tipocliente === '02'){ //CO
                $dataDescuentoMensual02['montodesc'][$k] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual02['descripcion'] = $item->descripcion;
                $dataDescuentoMensual02['cantidad'][$k] = (int)$item->cantidad1;
                $k++;
            }
            elseif((string)$item->tipocliente === '05'){ //MEG
                $dataDescuentoMensual05['montodesc'][$l] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual05['descripcion'] = $item->descripcion;
                $dataDescuentoMensual05['cantidad'][$l] = (int)$item->cantidad1;
                $l++;
            }
            elseif((string)$item->tipocliente === '06'){ //SECPUB
                $dataDescuentoMensual06['montodesc'][$m] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual06['descripcion'] = $item->descripcion;
                $dataDescuentoMensual06['cantidad'][$m] = (int)$item->cantidad1;
                $m++;
            }
            elseif((string)$item->tipocliente === '07'){ //MAO
                $dataDescuentoMensual07['montodesc'][$n] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual07['descripcion'] = $item->descripcion;
                $dataDescuentoMensual07['cantidad'][$n] = (int)$item->cantidad1;
                $n++;
            }
            elseif((string)$item->tipocliente === '12'){ //FE
                $dataDescuentoMensual12['montodesc'][$o] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual12['descripcion'] = $item->descripcion;
                $dataDescuentoMensual12['cantidad'][$o] = (int)$item->cantidad1;
                $o++;
            }
            elseif((string)$item->tipocliente === '13'){ //DIS
                $dataDescuentoMensual13['montodesc'][$p] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual13['descripcion'] = $item->descripcion;
                $dataDescuentoMensual13['cantidad'][$p] = (int)$item->cantidad1;
                $p++;
            }
            $dataDescuentoMensual01['total'] += $item->montodesc1;
            $dataDescuentoMensual01['totalcantidad'] += (int)$item->cantidad1;
//            $i++;
        }
        $dataDescuentoMensual01['total'] =round((double)$dataDescuentoMensual01['total'],2,PHP_ROUND_HALF_UP);
        $dataDescuentoMensual01['totalcantidad'] =(int)$dataDescuentoMensual01['totalcantidad'];

//        dd($dataDescuentoMensual01,$dataDescuentoMensual02,$dataDescuentoMensual05,$dataDescuentoMensual06,
//            $dataDescuentoMensual07,$dataDescuentoMensual12,$dataDescuentoMensual13
//        );


        $i =0;
        $dataDespachoTotalTipoPago['total'] = 0;
        foreach ($raw7 as $item){
            $dataDespachoTotalTipoPago['formapago'][$i] = $item->formapago;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).'k S/.';
            $dataDespachoTotalTipoPago['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataDespachoTotalTipoPago['total'] += $item->cantidad;
            $i++;
        }
        $dataDespachoTotalTipoPago['total'] =round((double)$dataDespachoTotalTipoPago['total'],0,PHP_ROUND_HALF_UP);


        $i =0;
        $dataDespachoTotalTipoItem['total'] = 0;
        foreach ($raw8 as $item){
            $dataDespachoTotalTipoItem['familia'][$i] = $item->familia;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataDespachoTotalTipoItem['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataDespachoTotalTipoItem['total'] += $item->cantidad;
            $i++;
        }
        $dataDespachoTotalTipoItem['total'] =round((double)$dataDespachoTotalTipoItem['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataDespachoTotalTipoCliente['total'] = 0;
        foreach ($raw9 as $item){
            $dataDespachoTotalTipoCliente['tipocliente'][$i] = $item->tipocliente;//.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataDespachoTotalTipoCliente['cantidad'][$i] = round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP);
            $dataDespachoTotalTipoCliente['total'] += $item->cantidad;
            $i++;
        }
        $dataDespachoTotalTipoCliente['total'] =round((double)$dataDespachoTotalTipoCliente['total'],0,PHP_ROUND_HALF_UP);

        $i =0;
        $dataDespachoTotalUnidadNegocio['total'] = 0;
        foreach ($raw10 as $item){
            $dataDespachoTotalUnidadNegocio['unidadnegocio'][$i] = $item->unidadnegocio;
            $dataDespachoTotalUnidadNegocio['cantidad'][$i] = round((double) $item->cantidad, 0, PHP_ROUND_HALF_UP);
            $dataDespachoTotalUnidadNegocio['total'] += $item->cantidad;
            $i++;
        }
        $dataDespachoTotalUnidadNegocio['total'] =round((double)$dataDespachoTotalUnidadNegocio['total'],0,PHP_ROUND_HALF_UP);




        $j =0; $k =0;
        $dataDescuentoTopAñoActual['total'] = 0;
        $dataDescuentoTopAñoPasado['total'] = 0;
        foreach ($raw11 as $item){
//            var_dump($item);

            if((string)$item->periodo === (string)$startDate->year ) {
                $dataDescuentoTopAñoActual['montodesc'][$j] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoTopAñoActual['descripcion'][$j] = $item->ClienteNombre;
//                $dataDescuentoTop1['mesdescripcion'][$j] = $item->mesdescripcion;
                $dataDescuentoTopAñoActual['total'] += $item->montodesc1;
                $j++;
            }
            else{ //CO
                $dataDescuentoTopAñoPasado['montodesc'][$k] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoTopAñoPasado['descripcion'][$k] = $item->ClienteNombre;
                $dataDescuentoTopAñoPasado['total'] += $item->montodesc1;
                $k++;
            }

//            $i++;
        }
        $dataDescuentoTopAñoActual['total'] =round((double)$dataDescuentoTopAñoActual['total'],2,PHP_ROUND_HALF_UP);
        $dataDescuentoTopAñoPasado['total'] =round((double)$dataDescuentoTopAñoPasado['total'],2,PHP_ROUND_HALF_UP);


//        dd(        $dataDescuentoTopAñoActual,  $dataDescuentoTopAñoPasado      );

        return view ('Dashboard.Indicadores.Comercial.ventas',compact('startDate',
            'dataDescuentoMensual01','dataDescuentoMensual02','dataDescuentoMensual05','dataDescuentoMensual06',
            'dataDescuentoMensual07','dataDescuentoMensual12','dataDescuentoMensual13',
            'dataDespachoTotalTipoPago','dataDespachoTotalTipoItem',
            'dataDespachoTotalTipoCliente','dataDespachoTotalUnidadNegocio',
            'dataDescuentoTopAñoActual',       'dataDescuentoTopAñoPasado'
//            ,'dataDescuentoTop3',
//            'dataDescuentoTop4', 'dataDescuentoTop5', 'dataDescuentoTop6'
        ));


    }


    public function marketing(Request $request)
    {
        $startDate = Carbon::now()->addDays(-1);
        dd($startDate);
    }

    public function postventa(Request $request)
    {
        $startDate = Carbon::now()->addDays(-1);
        dd($startDate);
    }
}


