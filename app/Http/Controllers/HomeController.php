<?php

namespace App\Http\Controllers;

use App\WH_TransaccionDetalle;
use App\WH_TransaccionHeader;
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
        $raw7 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoTotalTipoPago '".$firstDay."', '".$lastDay."'");
        $raw8 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoTotalTipoItem '".$firstDay."', '".$lastDay."'");
        $raw9 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoTotalTipoCliente '".$firstDay."', '".$lastDay."'");
        $raw10 = DB::select("exec [DiamanteWeb].dbo.sp_data_DespachoTotalUnidadNegocio '".$firstDay."', '".$lastDay."'");
//        dd($raw7);

        $dataDescargaHorno = array();
        $dataProduccionNetaPlanta = array();
        $dataRatioGasConSecadero = array();
        $dataRatioGasSinSecadero = array();
        $dataDespachoDiaroMillar = array();
        $dataDespachoDiaroSoles = array();
        $dataDespachoTotalTipoPago = array();
        $dataDespachoTotalTipoItem = array();
        $dataDespachoTotalTipoCliente = array();
        $dataDespachoTotalUnidadNegocio = array();

        $i =0;
        $dataDescargaHorno['total'] = 0;
        foreach ($raw1 as $item){
            $dataDescargaHorno['fecha'][$i] = date_create($item->fecha)->format('d-m');
            $dataDescargaHorno['cantidad'][$i] = (int) $item->cantidad;
            $dataDescargaHorno['total'] += $item->cantidad;
            $i++;
        }

        $i =0;
        $dataProduccionNetaPlanta['total'] = 0;
        foreach ($raw2 as $item){
            $dataProduccionNetaPlanta['fecha'][$i] = date_create($item->fecha)->format('d-m');
            $dataProduccionNetaPlanta['cantidad'][$i] = (int) $item->cantidad;
            $dataProduccionNetaPlanta['total'] += $item->cantidad;
            $i++;
        }

        $i =0;
        foreach ($raw3 as $item){
            $dataRatioGasConSecadero['fecha'][$i] = date_create($item->fecha)->format('d-m');
            $dataRatioGasConSecadero['ratio'][$i] = round((double) $item->ratio, 2, PHP_ROUND_HALF_UP);
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
            $dataDespachoDiaroMillar['cantidad'][$i] = round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP);
            $dataDespachoDiaroMillar['total'] += $item->cantidad;
            $i++;
        }

        $i =0;
        $dataDespachoDiaroSoles['total'] = 0;
        foreach ($raw6 as $item){
            $dataDespachoDiaroSoles['fecha'][$i] = date_create($item->fecha)->format('d-m');
            $dataDespachoDiaroSoles['cantidad'][$i] = round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP);
            $dataDespachoDiaroSoles['total'] += $item->cantidad;
            $i++;
        }
        $dataDespachoDiaroSoles['total'] =round((double)$dataDespachoDiaroSoles['total'],3,PHP_ROUND_HALF_UP);

        $i =0;
        $dataDespachoTotalTipoPago['total'] = 0;
        foreach ($raw7 as $item){
            $dataDespachoTotalTipoPago['formapago'][$i] = $item->formapago.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataDespachoTotalTipoPago['cantidad'][$i] = round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP);
            $dataDespachoTotalTipoPago['total'] += $item->cantidad;
            $i++;
        }

        $i =0;
        $dataDespachoTotalTipoItem['total'] = 0;
        foreach ($raw8 as $item){
            $dataDespachoTotalTipoItem['familia'][$i] = $item->familia.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataDespachoTotalTipoItem['cantidad'][$i] = round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP);
            $dataDespachoTotalTipoItem['total'] += $item->cantidad;
            $i++;
        }

        $i =0;
        $dataDespachoTotalTipoCliente['total'] = 0;
        foreach ($raw9 as $item){
            $dataDespachoTotalTipoCliente['tipocliente'][$i] = $item->tipocliente.' '.round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP).' Mill.';
            $dataDespachoTotalTipoCliente['cantidad'][$i] = round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP);
            $dataDespachoTotalTipoCliente['total'] += $item->cantidad;
            $i++;
        }

        $i =0;
        $dataDespachoTotalUnidadNegocio['total'] = 0;
        foreach ($raw10 as $item){
            $dataDespachoTotalUnidadNegocio['unidadnegocio'][$i] = $item->unidadnegocio;
            $dataDespachoTotalUnidadNegocio['cantidad'][$i] = round((double) $item->cantidad, 1, PHP_ROUND_HALF_UP);
            $dataDespachoTotalUnidadNegocio['total'] += $item->cantidad;
            $i++;
        }

        //dd($dataDespachoTotalTipoItem);

        return view('Dashboard.home',
            compact('dataProduccionNetaPlanta','dataDescargaHorno',
                'dataRatioGasConSecadero','dataRatioGasSinSecadero',
                'dataDespachoDiaroMillar','dataDespachoDiaroSoles',
                'dataDespachoTotalTipoPago','dataDespachoTotalTipoItem',
                'dataDespachoTotalTipoCliente','dataDespachoTotalUnidadNegocio',
                'startDate'));
    }

    public function comercial()
    {

//        $periodo = getdate()["year"].substr("00".getdate()["mon"],-2,2);
        //$periodo = date_create('01-05-2020');
//        dd($hoy->format("Ym"),$hoy);
        //$periodo = Carbon::now()->addDays(-1);
        $startDate = Carbon::now()->addDays(-1);

        $firstDay = Carbon::now()->addDays(-1)->startOfMonth();
        $lastDay = Carbon::now()->addDays(-1)->lastOfMonth();


        //dd($startDate,$firstDay,$lastDay);
//        $periodo = '202005';
        //dd($periodo->format('Ym'));
       $raw = DB::select("exec [DiamanteWeb].dbo.sp_data_DescargaHorno '".$firstDay."', '".$lastDay."'");//.$periodo->format('Ym'));
      //  $raw = DB::select("exec [DiamanteWeb].dbo.sp_data_DescargaHorno '2020-05-01', '2020-05-31'");//.$periodo->format('Ym'));
        //$raw = $this->getDataReporteDescargaHorno($periodo);//->format('Ym')

       //dd($raw);
//        $raw = DB::select("exec [DiamanteWeb].dbo.sp_data_pri ".$periodo);
        //$someArray = $raw->fecha;
//        $array = json_decode(json_encode($raw), true);
//        print_r(Object.keys($raw));
//        print_r(Object.values($raw));
//        print_r(Object.entries($raw));
        //print_r($raw);
//       dd($raw);
//        $_SESSION["cantidad"] = array();
//        $_SESSION["fecha"] = array();
//        $_SESSION["prueba"] = $raw;
        //$label = array();
        //dd($_SESSION["prueba"]);
//        $i = 0;
//        foreach ($raw as $item){
//            $_SESSION["cantidad"][$i] = $item->cantidad;
//            $_SESSION["fecha"][$i] = $item->fecha;
//            $i++;
//        }

//
        //dd($cantidad);
////        $header = WH_TransaccionHeader::where('CompaniaSocio','00000100')
////            ->where('TipoDocumento','NI')
////            ->where('NumeroDocumento','018226')
////            ->get();
//
////        $header2 = WH_TransaccionHeader::where('CompaniaSocio','00000100')
////            ->where('TipoDocumento','NI')
////            ->where('NumeroDocumento','018226')
////            ->first();
//
//
////        $detalle = WH_TransaccionDetalle::where('CompaniaSocio',$header[0]->CompaniaSocio)
////            ->where('TipoDocumento',$header[0]->TipoDocumento)
////            ->where('NumeroDocumento',$header[0]->NumeroDocumento)
////            ->get();
////
////        $secuencia = $header[0]->WH_TransaccionDetalle()->where('secuencia',2)->get();
////dd($header,$header2);
////        dd($secuencia);
////        dd($detalle,$header[0]->WH_TransaccionDetalle);
//
////        dd($data);
//
//        $fechas = DB::table('WH_TransaccionHeader')
//            ->select('fechadocumento')->distinct()->get();
////->WH_TransaccionDetalle()->sum('cantidad');
////        ->get();
//        $data = array();
//        foreach ($fechas as $fecha){
//            $headers = WH_TransaccionHeader::where('fechadocumento',$fecha->fechadocumento)->get();
//            $sum = 0;
//            foreach ($headers as $header){
//                foreach ($header->WH_TransaccionDetalle as $detalle){
//                    $sum += $detalle->cantidad;
//                }
//            }
//            $data[0] = $fecha;
//            $data[1] = $sum;
//        }
//        dd($data);
//
//
//
////        $detalle = WH_TransaccionDetalle::groupBy('WH_TransaccionHeader.fechadocumento')->get();
//
////        sum('cantidad')
//
//        dd($header);
//        dd($data->toArray());

//        $sales = Order::Sales('product')
//            ->where('approved','=','Yes')
//            ->groupBy('product_id')
//            ->orderBy(DB::raw('COUNT(id)','desc'))
//            ->get(array(DB::raw('COUNT(id) as totalsales'),'product_id'));
        $data = array();
        $i =0;
        $data['total'] = 0;
         foreach ($raw as $item){
//            $data[$i]['x'] = date_create($item->fecha)->format('d');
//            $data[$i]['y'] = $item->cantidad;
                $data['fecha'][$i] = date_create($item->fecha)->format('d-m');
                $data['cantidad'][$i] = (int) $item->cantidad;
                $data['total'] += $item->cantidad;

            $i++;
        }
         $data['total'] = (int) $data['total'];
//dd($data);

//        data: [{x:'2016-12-25', y:20}, {x:'2016-12-26', y:10}]

        return view ('Dashboard.Reportes.comercial',compact('data','startDate'));
//        return view ('Dashboard.Reportes.comercial',compact($_SESSION["cantidad"],$_SESSION["fecha"], $_SESSION["prueba"]));

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
