<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Alert;
use App\Models\SaleDetail;
use App\Models\User;
use App\Models\Status;
use App\Models\Sale;
use App\Models\Almacen;
use Illuminate\Http\Request;
use PDF;
use DB;

use NumerosEnLetras;

class ProductoController extends Component
{
    
    //muestra los valores dentro de la tabla
    public function index(){
        //$productos = SaleDetail::all();
        $productos = Alert::where("id","=",1)->get();    
        return view('index')->with('productos', $productos);
    }
    public function datosCliente(){
        $idUltimaVenta = Sale::latest()->first();                    
        view()->share('idUltimaVenta', $idUltimaVenta);
    }
    public function datosQr(){
        $idUltimaVenta = Sale::latest()->first(); 
        $resultado ="nombre:".$idUltimaVenta->nombrecliente."/"."ci/nit:".$idUltimaVenta->cedulacliente."/".$idUltimaVenta->total;         
        view()->share('resultado', $resultado);
    }
    public function totalALetras(){ //https://github.com/villca/Numeros-en-Letras
        $idUltimaVenta = Sale::latest()->first(); 
        $Letras = $idUltimaVenta->total; 
        $totalALetras = NumerosEnLetras::convertir($Letras); 

        view()->share('totalALetras', $totalALetras);
    }

    //Metodo para generar PDF
    public function claseCrearAlejandraPDF(){
        //Recuperar todos los productos de la db
        //$productos = Alert::all();
        $productos =[];
        //$productos = SaleDetail::all();

        //RECUPERAMOS EL ID DE LA ULTIMA VENTA QUE SE REGISTRA EN SALE
        $idUltimaVenta = Sale::latest()->first();
        //dd($idUltimaVenta->id);	
        $idNirvana = $idUltimaVenta->id;
       
		//dd($idUltimaVenta->id);	

        //BUSCAMOS DENTRO DE SALE_DETAILS TODOS LOS SALE_ID IDENTICOS
        $productos = SaleDetail::join('sales as s','s.id','sale_details.sale_id')            
        ->select(
            'sale_details.*', 
            's.total as total',
            's.items as item',
            's.nombrecliente as nombre',
            's.cedulacliente as cedula',
            'sale_details.quantity as cantidad'
            )
        ->where('sale_details.sale_id','=',$idNirvana)        
        //->orderBy('id','asc')      
        ->get();

   
        $this->datosCliente();
        $this->datosQr();
        $this->totalALetras();

        view()->share('productos', $productos);

        //$pdf = PDF::loadView('pdfa.reporte', compact('data','reportType','product','dateFrom','dateTo'));
        $pdf = PDF::loadView('recibo', compact($productos));

        return $pdf->download('archivo-pdf.pdf');
    }

    public function precioLetras(){       
        $mensaje=[];
        //$mensaje = Alert::where("id","=",1)->get(); 
        $idUltimaVenta = Sale::latest()->first();        
        $idNirvana = $idUltimaVenta->id; 
        $precioFinal = DB::table('sales')
            ->select('sales.total')
            ->where('sales.id','=',$idNirvana)
            ->get();
        //dd($precioFinal);
        $precio = DB::table('sales')->where('id', $idNirvana)->value('total');	
        
        $formatter = new NumeroALetras();
        echo $formatter->toMoney($precio, 2, 'BOLIVIANOS', 'CENTAVOS');

        $mensaje = $formatter; 
       
           
        view()->share('mensaje', $mensaje);        
    }
    
}

