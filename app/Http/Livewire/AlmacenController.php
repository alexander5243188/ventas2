<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Almacen;

use App\Http\Livewire\Scaner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;

use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Traits\CartTrait;
use App\Models\Brand;
use App\Models\Companie;
use App\Models\Iva;
use App\Models\Wholesaler;
use App\Models\Alert;
use App\Models\Country;
use App\Models\Shelf;
use App\Models\Level;
use App\Models\Proveedor;
use App\Models\User;
use DB;
use App\Models\SaleDetail;
use Carbon\Carbon;

class AlmacenController extends Component
{
    use WithPagination;
	use WithFileUploads;
	use CartTrait;
    public 
		$graci,
		$pageTitle,
		$search,
		$componentName,	
		$selected_id,	
		$fechaIngresoAlmacen,
		$productoid,
		$proveedorid,
		$cantidadProductoActualizado,
		$ingresoProducto,
		$salidaProducto,
		$fechaIngreso,
		$productId,
		$sumDetailsProducto, $producto,
		$totalStock, $totalIngreso, $totalSalida, 
		$alejandra, $graciela, $repositorio, $nirvana,$alexander,
		$year, $top5Data = [];

    private $pagination = 6;

    public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'Almacen';
		$this->ingresoProducto = 'INGRESO';
		$this->salidaProducto ='';
		$this->year = date('Y');

		$this->totalStock =0;
		$this->totalIngreso =0;
		$this->totalSalida =0;	

		$this->graci=[];
	
	}
	public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

    public function render()
    {
		//$var = $this->getData();
		//$this->getTop5();
		//$this->reporteProducto();		
		//config(['repositorio' => $graciela]);
				

        if(strlen($this->search) > 0)
		$data = Almacen::join('products as p','p.id','almacens.product_id')
			->join('shelves as s', 's.id', 'p.shelf_id')
			->join('levels as l', 'l.id', 'p.level_id')
			->join('proveedors as pro', 'pro.id', 'p.proveedor_id')
			->select(
				'almacens.*',
				'p.name as nombre',
				'p.cost as preciocompra',
				'p.price as precioventa',
				'p.proveedor_id as nombreproveedor',
				'p.stock as cantidadproducto',
				'p.stock as cantidadproducto',
				's.name as estante',
				'l.name as nivel',
				'p.level_id as nivel',
				'pro.name as proveedor'				
		)
		->where('p.name', 'like', '%' . $this->search .'%')		
		->paginate($this->pagination);
	else

		$data = Almacen::join('products as p','p.id','almacens.product_id')
			->join('shelves as s', 's.id', 'p.shelf_id')
			->join('levels as l', 'l.id', 'p.level_id')
			->join('proveedors as pro', 'pro.id', 'p.proveedor_id')		
			->select(
				'almacens.*',
				'p.name as nombre',
				'p.cost as preciocompra',
				'p.price as precioventa',
				'p.proveedor_id as nombreproveedor',
				'p.stock as cantidadproducto',
				'p.stock as cantidadproducto',
				's.name as estante',
				'l.name as nivel',
				'p.level_id as nivel',
				'pro.name as proveedor'	
			)			
		->orderBy('almacens.id','desc')
		->paginate($this->pagination);	
		//dd($data);
		
        return view('livewire.almacen.almacen',  [
			'data' => $data,
			'products' => Product::orderBy('name', 'asc')->get(),
			'proveedors' => Proveedor::orderBy('name', 'asc')->get(),
			//'nombre' =>$var
			
		])
        ->extends('layouts.theme.app')
        ->section('content');;
    }

    public function Store()
	{
		$rules = [            
			'fechaIngresoAlmacen' => 'required',
            'productoid' => 'required|not_in:Elegir',
            'cantidadProductoActualizado' => 'required',
			'proveedorid' => 'required|not_in:Elegir'
        ];
		$messages = [
            
            'fechaIngresoAlmacen.required' => 'La fecha esrequerida',
            'productoid.required' => 'El producto es requerido',
            'cantidadProductoActualizado.required' => 'La cantidad de producto es requerido',
			'proveedorid.required' => 'El proveedor es requerido'
        ];			
		$this->validate($rules, $messages);
	

		$obtenerValor = Product::find($this->productoid);
		$busqueda = $obtenerValor->name;
		$sumaingreso = $obtenerValor->stock;
		
		$almacen = Almacen::create([		
			'fecha' => $this->fechaIngresoAlmacen,
			'product_id' => $this->productoid,
			'proveedor_id' => $this->proveedorid,
			'stock' => $this->cantidadProductoActualizado,
			'stockI' => $this->cantidadProductoActualizado,
			'ingreso' => $this->ingresoProducto,
			'salida' => $this->salidaProducto,
			'nombrevendedor' => Auth()->user()->name,
			'producto' => $busqueda,
			'restante' =>$sumaingreso + $this->cantidadProductoActualizado
		]);

		//-------------------------- ACTUALIZAR DATOS DEL PRODUCTO
		$product = Product::find($almacen->product_id);
		$temp = $product->stock;
		//dd($temp);
		$product->stock = $almacen->stock + $temp;
		$product->save();
		//--------------------------
		$this->resetUI();
		$this->emit('product-added', 'Producto Registrado');
	}
	public function reporteProducto(){		
		$productId = $this->productId;
		//dd($productId);		
		$alejandra = $productId;
		$nirvana = $productId;
		
			
		//--------------- Numero de Ingresos de mercaderia
		$listaAlmacen = DB::table('almacens as a')		
		->selectRaw('sum(a.stockI)')
		->groupBy('a.product_id')
		->where('a.product_id', '=', $alejandra)
		->value('sum');
		//->get();
		//dd($listaAlmacen);

		//---------------- Numero de salidas mercaderia
		$listaDetalleVenta = DB::table('sale_details as venta')		
		->selectRaw('sum(venta.quantity)')
		->groupBy('venta.product_id')
		->where('venta.product_id','=', $alejandra)
		->value('sum');
		//->get();
		//dd($listaDetalleVenta);
		
		$res = $listaAlmacen - $listaDetalleVenta;
		//dd($res);
		$this->totalStock = $res;
		$this->totalIngreso = $listaAlmacen;
		$this->totalSalida = $listaDetalleVenta;		

		
		//-----------------------------------------
		//$repositorio = $this->reportesNombre($nirvana);
		//dd($repositorio);	
		//$repositorio = $this->busqueda($nirvana);

		//------------------------------------------------ PDF
		$data = DB::table('almacens')
		->select('almacens.*')
		->where('almacens.product_id','=', $nirvana)
		->get();
		//dd($data);
	}
	
	
	public function reportesNombre($nirvana){				
		$graciela = Almacen::join('products as p','p.id','almacens.product_id')
		->select(
			'almacens.*',
			'p.name as nombre'			
		)
		->where('almacens.product_id','=',$nirvana)	
		->value('nombre');		
		//$this->busqueda($graciela);		
		
		return($graciela);		
	}
	
	public function busqueda($nirvana){		
		$data = DB::table('almacens')
		->select('almacens.*')
		->where('almacens.product_id','=', $nirvana)
		->get();
		//dd($data);
	}



	protected function getData()
	{		
		$nirvana = 1;
		return Almacen::join('products as p','p.id','almacens.product_id')
		->select(
			'almacens.*',
			'p.name as nombre'			
		)
		->where('almacens.product_id','=',$nirvana)	
		->value('nombre');
		
	}
	public function Recibir() { $var = $this->getData();}
	
	public function resetUI(){
		$this->fechaIngresoAlmacen = '';     
        $this->productoid = 'Elegir';
		$this->proveedorid = 'Elegir';
		$this->cantidadProductoActualizado = ''; 			
	}

	public function alejandra(){
			$from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d')   . ' 23:59:59';

		$graci = Almacen::join('products as p','p.id','almacens.product_id') 
            ->select('almacens.*','p.name as producto')
            ->whereBetween('almacens.created_at', [$from, $to])
            ->get();
			dd($graci);
	}


	
}