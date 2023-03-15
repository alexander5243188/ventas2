<?php

namespace App\Http\Livewire;


use App\Http\Livewire\Scaner;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
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
use App\Models\Almacen;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProductsController extends Scaner //Component
{

	use WithPagination;
	use WithFileUploads;
	use CartTrait;


	public 
		$name,
		$barcode,
		$cost,
		$price,
		$stock,		
		$categoryid,
		$search,
		$image,
		$selected_id,
		$pageTitle,
		$componentName,		
		$brandid,
		$countryid,
        $ivaid,
		//$wholesalerid,
		$proveedorid,
		$alertid,
		$alejandra, $graciela,
		$shelfid,
		$levelid,
		$userid,
		$alejandraamor,
		$type,
		$seriecomprobante,
		$fechaAlmacen,
		$tipoIngreso;

	private $pagination = 5;



	public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}



	public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'Producto';		
		$this->categoryid = 'Elegir';
		$this->brandid = 'Elegir';
        //$this->ivaid = 'Elegir';
		//$this->ivaid = 'Elegir';
		//$this->wholesalerid = 'Elegir';
		$this->alertid = 1;
		
		$this->countryid = 'Elegir';
		//$this->wholesalerid = 'Elegir';
		$this->proveedorid = 'Elegir';
		$this->shelfid = 'Elegir';
		$this->levelid = 'Elegir';
		$this->type ='Elegir';

		$this->fechaAlmacen = '';
		$this->tipoIngreso= 'INGRESO';
		
	}


	public function render()
	{   
		if(strlen($this->search) > 0)
		$data = Product::join('brands as b','b.id','products.brand_id')
		->join('users as use','use.id', 'products.user_id')
		->join('categories as c','c.id','products.category_id')
		//->join('companies as co', 'co.id','products.companie_id',)
		//->join('wholesalers as w', 'w.id','products.wholesaler_id',)
		->join('proveedors as p', 'p.id','products.proveedor_id',)
		//->join('ivas as i','i.id','products.iva_id')
		->join('alerts as a','a.id','products.alert_id')
		->join('countries as co','co.id','products.countrie_id')
		->join('shelves as s', 's.id', 'products.shelf_id')
		->join('levels as le', 'le.id', 'products.level_id')
		->select(
			'products.*',
			'b.name as brand',
			'use.name as user',
			'c.name as category', 
			//'co.name as companie',
			//'w.name as wholesaler',
			'p.name as proveedor',
			//'i.tax as iva',
			'a.name as alert',
			'co.name as country',
			's.name as shelf',
			'le.name as level'
			)
		->where('products.name', 'like', '%' . $this->search .'%')
		->orWhere('products.barcode', 'like', '%' .$this->search . '%')
		->orWhere('c.name', 'like', '%' . $this->search . '%')
		->orWhere('products.nircode', 'like', '%' . $this->search . '%')
		->orderBy('products.name', 'asc')
		->paginate($this->pagination);
	else

		$data = Product::join('brands as b','b.id','products.brand_id')
		->join('categories as c','c.id','products.category_id')
		->join('users as use','use.id', 'products.user_id')
		//->join('companies as co', 'co.id','products.companie_id',)
		//->join('wholesalers as w', 'w.id', 'products.wholesaler_id')
		->join('proveedors as p', 'p.id', 'products.proveedor_id')
		//->join('ivas as i','i.id','products.iva_id')
		->join('alerts as a','a.id','products.alert_id')
		->join('countries as co','co.id','products.countrie_id')
		->join('shelves as s', 's.id', 'products.shelf_id')
		->join('levels as le', 'le.id', 'products.level_id')
		->select(
			'products.*',
			'b.name as brand',
			'use.name as user',
			'c.name as category', 
			'a.name as alert',
			//'co.name as companie',
			//'w.name as wholesaler',
			'p.name as proveedor',
			//'i.tax as iva',
			'co.name as country',
			's.name as shelf',
			'le.name as level'
			)
		->orderBy('products.name','asc')
		->paginate($this->pagination);

		return view('livewire.products.component', [
			'data' => $data,
			'brands' => Brand::orderBy('name', 'asc')->get(),
            'categories' => Category::orderBy('name', 'asc')->get(),
            //'companies' => Companie::orderBy('name', 'asc')->get(),
			//'wholesalers' => Wholesaler::orderBy('name', 'asc')->get(),
			'proveedors' => Proveedor::orderBy('name', 'asc')->get(),
            //'ivas' => Iva::orderBy('tax', 'asc')->get(),
			'alerts' => Alert::orderBy('name', 'asc')->get(),
			'countries' => Country::orderBy('name', 'asc')->get(),
			'shelves' => Shelf::orderBy('name', 'asc')->get(),
			'levels' => Level::orderBy('name', 'asc')->get()
		])
		->extends('layouts.theme.app')
		->section('content');
	}


	public function Store()
	{		
		$rules = [
            'name' => 'required|unique:products|min:3',
			//'barcode' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'stock' => 'required',
            //'alertid' => 'required|not_in:Elegir',
            'brandid' => 'required|not_in:Elegir',            
            'categoryid' => 'required|not_in:Elegir',          
            //'ivaid' => 'required|not_in:Elegir',
			'countryid' => 'required|not_in:Elegir',
			//'wholesalerid' => 'required|not_in:Elegir',
			'proveedorid' => 'required|not_in:Elegir',
			'shelfid' => 'required|not_in:Elegir',
			'levelid' => 'required|not_in:Elegir',
			
        ];
        $messages = [
            'name.required' => 'El nombre del producto es requerido',
            'name.unique'=> 'El nombre del producto ya esta registrado',
            'name.min' => 'El nombre del producto debe tener por lo menos 3 digitos',
			//'barcode.required' => 'Ingrese el codigo del producto',
            'cost.required' => 'EL costo es requerido',
            'price.required' => 'El precio es requerido',
            'stock.required' => 'El stock es requerido',
            //'alertid.required' => 'El valor de inventario es requerido',
            'brandid.not_in' => 'La marca es requerida',
            'categoryid_not_in' => 'La categoria es requerida',       
            //'ivaid.not_in' => 'EL iva es requerido',
			'countryid.not_in' => 'El pais es requerido',
			//'wholesalerid.not_in' => 'El mayorista es requerido',
			'proveedorid.not_in' => 'El proveedor es requerido',
			'shelfid.not_in' => 'El estante es requerido',
			'levelid.not_in' => 'El nivel es requerido',
			
        ];

		$this->validate($rules, $messages);
		

		// Fluent Query Builder
		//$users = DB::table('users')->where('username', '=', 'dayle')->get();
		//SELECT * FROM users WHERE username = 'dayle';

		//$graciela = DB::table('ivas')->where();
		
		
		//$graciela = Iva::all()->first();
		//$gracielaAlejandra = $graciela->tax;
		
		
		//dd($gracielaAlejandra);

		//$alejandraamor = Auth()->user()->id;
		//dd($alejandraamor);
		//$valor = Str::limit($this->name,3,'');

		
		$valor = "fuentes "."-".$this->name." Bs".$this->price;		
        $nirc = Str::finish( 'comercial-',$valor);
		

		$product = Product::create([
			'name' =>$this->name,
			'barcode' =>$nirc,
			'nircode' => $nirc,
            'cost' =>$this->cost,           
            //'price' =>$this->price+ ($this->price*0.13),
			//'price' =>$this->price+ ($this->price * ($gracielaAlejandra/100)),			
			'price' =>$this->price,
            'stock' =>$this->stock,
            'alert_id' =>$this->alertid,
			'category_id' =>$this->categoryid,  
            'brand_id' =>$this->brandid,                   
            //'iva_id' =>$this->ivaid,
			'countrie_id' =>$this->countryid,
			//'wholesaler_id' => $this->wholesalerid,
			'proveedor_id' => $this->proveedorid,
			'shelf_id' => $this->shelfid,
			'level_id' => $this->levelid,
			//'user_id' => $this->alejandramor
			'user_id' => Auth()->user()->id,
			//'type' => $this->type,			
		]);
		// ---------------------------------------------registrar dato en almacen	
		$idregistro = $product->id;
		$idregistroproveedor = $product->proveedor_id;
		
		//dd($alejandra);
		$idProducto = Product::find($idregistro);
		$idProveedor = Product::find($idregistroproveedor);	
		$nombreProducto = $idProducto->name;	
		//dd($nombreProducto);

		//dd($product->id);
		$almacen = Almacen::create([
			//'fecha'=> $this->fechaAlmacen,
			'fecha'=> Carbon::now(),
			'product_id' => $idregistro,
			'proveedor_id' => $idregistroproveedor,
			'stock' => $this->stock,
			'stockI' => $this->stock,
			'ingreso' => $this->tipoIngreso,
			'producto' => $nombreProducto
		]);
		//dd($almacen);
		//*********************************************************************** */
//dd($product);
		if($this->image) 
		{
			$customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/products/', $customFileName);
            $product->image = $customFileName;
            $product->save();
		}

		$this->resetUI();
		$this->emit('product-added', 'Producto Registrado');


	}

	public function Edit(Product $product)
	{
		//dd($product);
		$this->selected_id = $product->id;
		$this->name = $product->name;
		//$this->barcode = $product->nircode;		
		
		$this->cost = $product->cost;
		$this->price = $product->price;
		$this->stock = $product->stock;
		//$this->alertid = $product->alert_id;
		$this->categoryid = $product->category_id;
		//$this->ivaid = $product->iva_id;
		$this->countryid = $product->countrie_id;
		$this->brandid = $product->brand_id;
		//$this->wholesalerid = $product->wholesaler_id;
		$this->proveedorid = $product->proveedor_id;
		$this->shelfid = $product->shelf_id;
		$this->levelid = $product->level_id;
		//$this->userid = $product->user_id;
		//$this->image = $product->image;
		//$this->type = $product->type;
		//$this->seriecomprobante = $product->serie_comprobante;
		//dd($product->image);

		$this->emit('modal-show','Show modal');
	}

	public function Update()
	{
		$rules = [
            'name' => "required|min:3|unique:products,name,{$this->selected_id}",
            'cost' => 'required',
            'price' => 'required',
            'stock' => 'required',
            //'alertid' => 'required|not_in:Elegir',
            'brandid' => 'required|not_in:Elegir',            
            'categoryid' => 'required|not_in:Elegir',          
            //'ivaid' => 'required|not_in:Elegir',
			//'wholesalerid' => 'required|not_in:Elegir',
			'proveedorid' => 'required|not_in:Elegir',
			'shelfid' => 'required|not_in:Elegir',
			'levelid' => 'required|not_in:Elegir',
			
        ];
        $messages = [
            'name.required' => 'El nombre del producto es requerido',
            'name.unique'=> 'El nombre del producto ya esta registrado',
            'name.min' => 'El nombre del producto debe tener por lo menos 3 digitos',
            'cost.required' => 'EL costo es requerido',
            'price.required' => 'El precio es requerido',
            'stock.required' => 'El stock es requerido',
            //'alertid.required' => 'El valor minimo de inventario es requerido',
            'brandid.not_in' => 'La marca es requerida',
            'categoryid.not_in' => 'La categoria es requerida',           
            //'ivaid.not_in' => 'EL iva es requerido',
			//'wholesalerid.not_in' => 'El mayorista es requerido',
			'proveedorid.not_in' => 'El proveedor es requerido',
			'shelfid.not_in' => 'El estante es requerido',
			'levelid.not_in' => 'El nivel es requerido',
			
        ];

		$this->validate($rules, $messages);

		$product = Product::find($this->selected_id);
		//dd($product);
		$product->update([
			'name' =>$this->name,
            'cost' =>$this->cost,
            'barcode' =>$this->barcode,
            'price' =>$this->price,
            'stock' =>$this->stock,
            //'alert_id' =>$this->alertid,
            'brand_id' =>$this->brandid,
            'category_id' =>$this->categoryid,           
            //'iva_id' =>$this->ivaid,
			'countrie_id' =>$this->countryid,
			//'wholesaler_id' => $this->wholesalerid,
			'proveedor_id' => $this->proveedorid,
			'shelf_id' => $this->shelfid,
			'level_id' => $this->levelid,
			//'user_id' => $this->userid,
			//'type' => $this->type,
			//'serie_comprobante' => $this->seriecomprobante,
		]);

		if($this->image) 
		{
			$customFileName = uniqid() . '_.' . $this->image->extension();
			$this->image->storeAs('public/products', $customFileName);
			$imageTemp = $product->image; // imagen temporal
			$product->image = $customFileName;
			$product->save();

			if($imageTemp !=null) 
			{
				if(file_exists('storage/products/' . $imageTemp )) {
					unlink('storage/products/' . $imageTemp);
				}
			}
		}

		$this->resetUI();
		$this->emit('product-updated', 'Producto Actualizado');


	}



	public function resetUI()
	{
		$this->name = '';
        $this->barcode = '';
        $this->cost = '';
        $this->price = '';
        $this->stock = '';
        //$this->alert_id = '';
        $this->search = '';
        $this->selected_id = 0;
        //$this->image = null;
        $this->brandid = 'Elegir';
        $this->categoryid = 'Elegir';
		$this->countryid = 'Elegir';
        //$this->ivaid = 'Elegir';
		//$this->wholesalerid = 'Elegir';
		$this->proveedorid = 'Elegir';
		$this->shelfid = 'Elegir';
		$this->levelid = 'Elegir';
        $this->resetValidation(); 
		

	}

	protected $listeners =[
		'deleteRow' => 'Destroy'		
	];

	public function ScanCode($code)
	{
		$this->ScanearCode($code);
		$this->emit('global-msg',"SE AGREGÓ EL PRODUCTO");
	}


	public function Destroy(Product $product)
	{
		//dd($product);
		$imageTemp = $product->image;		
		$product->delete();

		if($imageTemp !=null) {
			if(file_exists('storage/products/' . $imageTemp )) {
				unlink('storage/products/' . $imageTemp);
			}
		}

		$this->resetUI();
		$this->emit('product-deleted', 'Producto Eliminado');
	}


}






