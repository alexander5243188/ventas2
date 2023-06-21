<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Sale;
use App\Models\SaleDetail;

use App\Models\client;

use Carbon\Carbon;
use Livewire\WithPagination;


class ReportsController extends Component
{
    use WithPagination;

    public $componentName, $data, $details, $sumDetails, $countDetails, 
    $reportType, $userId, $dateFrom, $dateTo, $saleId;

    private $pagination = 10;

    public function mount()
    {
        $this->componentName ='Reportes de Ventas';
        $this->data =[];
        $this->details =[];
        $this->sumDetails =0;
        $this->countDetails =0;
        $this->reportType =0;
        $this->userId =0;
        $this->saleId =0;

    }
    public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

    public function render()
    {

        $this->SalesByDate();
       

        return view('livewire.reports.component', [
            'users' => User::orderBy('name','asc')->get(), 
        ])->extends('layouts.theme.app')
        ->section('content');
    }

    public function SalesByDate()
    {
        if($this->reportType == 0) // ventas del dia
        {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d')   . ' 23:59:59';

        } else {
             $from = Carbon::parse($this->dateFrom)->format('Y-m-d') . ' 00:00:00';
             $to = Carbon::parse($this->dateTo)->format('Y-m-d')     . ' 23:59:59';
             
        }

        if($this->reportType == 1 && ($this->dateFrom == '' || $this->dateTo =='')) {
            $this->data = [];
            return;
        }

        if($this->userId == 0) 
        {
            $this->data = Sale::join('users as u','u.id','sales.user_id')
            //
            ->join('sale_details as s', 's.id', 's.sale_id')            
            ->select('sales.*','u.name as user','s.producto as producto') //PODRIAS AÑADIR TOTAL de sales
            //
            ->select('sales.*','u.name as user')
            
            
            ->whereBetween('sales.created_at', [$from, $to])  
            // PARA CONTROLAR QUE AL PRINCIPIO NO APAREZCA TODOS LOS DATOS DE LAS VENTAS
            ->where('user_id', $this->userId)
            ->orderBy('id','desc')          
            ->get();            
        } else {
            $this->data = Sale::join('users as u','u.id','sales.user_id')  
                                        
            ->select('sales.*','u.name as user')
           
            ->whereBetween('sales.created_at', [$from, $to])
            ->where('user_id', $this->userId)
            ->orderBy('id','desc')
            ->get();            
        }
        $this->totalVentas();               

    }    
    public function totalVentas(){
        $idUltimaVenta = Sale::latest()->first();
        view()->share('idUltimaVenta', $idUltimaVenta);        
    }    
    // ----------------------------------------------- para el numero de factura
    public function numeroFactura(){
        $idCliente = Client::latest()->first();                          
        view()->share('idCliente', $idCliente);
    } 
    //---------------------------------------------------------------------------

    // RETORNA LOS DATOS PARA EL MODAL, RECIBE $saleid y devuelve details para la iteracion
    public function getDetails($saleId)
    {
        $this->details = SaleDetail::join('products as p','p.id','sale_details.product_id')
        ->select('sale_details.id','sale_details.price','sale_details.quantity','p.name as product')
        ->where('sale_details.sale_id', $saleId)
        ->get();


        //
        $suma = $this->details->sum(function($item){
            return $item->price * $item->quantity;
        });

        $this->sumDetails = $suma;
        $this->countDetails = $this->details->sum('quantity');
        $this->saleId = $saleId;

        $this->emit('show-modal','details loaded');

    }


}
