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
}
