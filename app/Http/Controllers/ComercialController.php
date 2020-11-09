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
//        dd($raw1);
//        $dataDescuentoMensual00 = array();
        $dataDescuentoMensual01 = array();
        $dataDescuentoMensual02 = array();
        $dataDescuentoMensual05 = array();
        $dataDescuentoMensual06 = array();
        $dataDescuentoMensual07 = array();
        $dataDescuentoMensual12 = array();
        $dataDescuentoMensual13 = array();
//        $i =0;
        $j =0; $k =0; $l =0; $m =0; $n =0; $o =0; $p=0;
        $dataDescuentoMensual01['total'] = 0;
        foreach ($raw1 as $item){
//            var_dump($item);

            if((string)$item->tipocliente === '01' ) { //CF
                $dataDescuentoMensual01['montodesc'][$j] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual01['descripcion'] = $item->descripcion;
                $dataDescuentoMensual01['cantidad'][$j] = $item->cantidad1;
                $dataDescuentoMensual01['mesdescripcion'][$j] = $item->mesdescripcion;
                $j++;
            }
            elseif((string)$item->tipocliente === '02'){ //CO
                $dataDescuentoMensual02['montodesc'][$k] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual02['descripcion'] = $item->descripcion;
                $dataDescuentoMensual02['cantidad'][$k] = $item->cantidad1;
                $k++;
            }
            elseif((string)$item->tipocliente === '05'){ //MEG
                $dataDescuentoMensual05['montodesc'][$l] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual05['descripcion'] = $item->descripcion;
                $dataDescuentoMensual05['cantidad'][$l] = $item->cantidad1;
                $l++;
            }
            elseif((string)$item->tipocliente === '06'){ //SECPUB
                $dataDescuentoMensual06['montodesc'][$m] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual06['descripcion'] = $item->descripcion;
                $dataDescuentoMensual06['cantidad'][$m] = $item->cantidad1;
                $m++;
            }
            elseif((string)$item->tipocliente === '07'){ //MAO
                $dataDescuentoMensual07['montodesc'][$n] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual07['descripcion'] = $item->descripcion;
                $dataDescuentoMensual07['cantidad'][$n] = $item->cantidad1;
                $n++;
            }
            elseif((string)$item->tipocliente === '12'){ //FE
                $dataDescuentoMensual12['montodesc'][$o] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual12['descripcion'] = $item->descripcion;
                $dataDescuentoMensual12['cantidad'][$o] = $item->cantidad1;
                $o++;
            }
            elseif((string)$item->tipocliente === '13'){ //DIS
                $dataDescuentoMensual13['montodesc'][$p] = round((double)$item->montodesc1, 2, PHP_ROUND_HALF_UP);
                $dataDescuentoMensual13['descripcion'] = $item->descripcion;
                $dataDescuentoMensual13['cantidad'][$p] = $item->cantidad1;
                $p++;
            }
            $dataDescuentoMensual01['total'] += $item->montodesc1;
//            $i++;
        }
        $dataDescuentoMensual01['total'] =round((double)$dataDescuentoMensual01['total'],2,PHP_ROUND_HALF_UP);

//        dd($dataDescuentoMensual01,$dataDescuentoMensual02,$dataDescuentoMensual05,$dataDescuentoMensual06,
//            $dataDescuentoMensual07,$dataDescuentoMensual12,$dataDescuentoMensual13
//        );


        return view ('Dashboard.Reportes.Comercial.ventas',compact('startDate',
            'dataDescuentoMensual01','dataDescuentoMensual02','dataDescuentoMensual05','dataDescuentoMensual06',
            'dataDescuentoMensual07','dataDescuentoMensual12','dataDescuentoMensual13'
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


