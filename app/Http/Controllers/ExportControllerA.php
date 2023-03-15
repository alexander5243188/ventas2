<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

use App\Exports\SalesExport;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\User;
use App\Models\Almacen;
use App\Models\Product;

use DB;



class ExportControllerA extends Controller
{
    //
    public function reportPDF ($productId, $reportType, $dateFrom = null, $dateTo = null)
    {       
        $data = [];
        if($reportType == 0) // vreporte del dia
        {
            //fecha del sistema
            $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d')   . ' 23:59:59';
           

        } else { //fecha seleccionada
             $from = Carbon::parse($dateFrom)->format('Y-m-d') . ' 00:00:00';
             $to = Carbon::parse($dateTo)->format('Y-m-d')     . ' 23:59:59';        
        }
        //seleccionamos los productos
        if($productId == 0) //consultamos todos de almacen
        {
            $data = Almacen::join('products as p','p.id','almacens.product_id')            
            ->join('users as u','u.id','=','p.user_id')            
            ->select('almacens.*','p.name as producto')
            ->whereBetween('almacens.created_at', [$from, $to])
            ->orderBy('id','asc')
            ->get();
            
        } else {
            $data = DB::table('almacens as a')
            ->whereBetween('a.fecha', [$from, $to])
            ->where('a.product_id','=',$productId)
            ->orderBy('a.id','asc')
            ->get();   
            
           
        }
        $product = $productId == 0 ? 'Todos' : Product::find($productId)->name;
        $pdf = PDF::loadView('pdfa.reporte', compact('data','reportType','product','dateFrom','dateTo'));
        return $pdf->stream('almacenReport.pdf');
        //return $pdf->download('almacenReport.pdf');
    }
}
