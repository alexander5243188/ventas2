<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Almacen;
use Carbon\Carbon;
use App\Models\Product;
use DB;

class ReportalmacensController extends Component
{
    public 
        $componentName, 
        $data, 
        $details, 
        $sumDetails, 
        $countDetails, 
        $reportType, 
        $userId, 
        $dateFrom, 
        $dateTo, 
        $saleId,
        $almacen,
        $productId;
    
    public function mount()
    {
        $this->componentName ='Reporte inventario';
        $this->data =[];
        $this->details =[];
        $this->sumDetails =0;
        $this->countDetails =0;
        $this->reportType =0;
        $this->userId =0;
        $this->saleId =0;
        $this->almacen =[]; 
        $this->productId =0;   
    }

    public function render()
    {
        $this->AlacenByDate();

        return view('livewire.reportsA.component',[
            'users' => User::orderBy('name','asc')->get(), 
            'products' => Product::orderBy('name','asc')->get(), 
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }
    public function AlacenByDate(){
        if($this->reportType == 0) // vreporte del dia
        {
            //fecha del sistema
            $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d')   . ' 23:59:59';
           

        } else { //fecha seleccionada
             $from = Carbon::parse($this->dateFrom)->format('Y-m-d') . ' 00:00:00';
             $to = Carbon::parse($this->dateTo)->format('Y-m-d')     . ' 23:59:59';
        
        }
        //si no selecciona nada y las fechas estan vacias
        if($this->reportType == 1 && ($this->dateFrom == '' || $this->dateTo =='')) {
            $this->data = [];
            return;
        }

        //seleccionamos los productos
        if($this->productId == 0) //consultamos todos de almacen
        {
            $this->data = Almacen::join('products as p','p.id','almacens.product_id')            
            ->join('users as u','u.id','=','p.user_id')                      
            ->select('almacens.*','p.name as producto')            
            ->whereBetween('almacens.fecha', [$from, $to])           
            ->orderBy('id','desc')
            ->latest()
            ->take(50)
            ->get();            
        } else {
            $this->data = Almacen::join('products as p','p.id','almacens.product_id') 
            ->join('users as u','u.id','=','p.user_id')            
            ->select('almacens.*','p.name as producto')
            ->whereBetween('almacens.fecha', [$from, $to])
            ->where('product_id', $this->productId)  
            ->orderBy('id','desc')          
            ->latest()
            ->take(15)
            ->get();            
        }
    }
    public function getDetails($saleId)//EWCIB EL ID DE LA VENTA
    {   
        
        $this->details = DB::table('almacens')
		->selectRaw('almacens.*')			
		->where('almacens.product_id', '=', $saleId)			
		->get(); 

        $this->emit('show-modal',' loaded'); // EN FRONT SEPA QUE TIENE QUE MOSTRAR UNA MODAL AL EMITIR DESDE EL BACK

    }
}
