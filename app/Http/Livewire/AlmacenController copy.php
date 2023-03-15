<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Almacen;

use App\Http\Livewire\Scaner;
use App\Models\Category;
use App\Models\Product;

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

class AlmacenController extends Component
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
		$componentNames,
		$brandid,
		$countryid,
        $ivaid,
		$wholesalerid,
		$proveedorid,
		$alertid,
		$alejandra, $graciela,
		$shelfid,
		$levelid,
		$userid,
		$alejandraamor,
		$type,
		$seriecomprobante,
		$nuevoValor, 
		$year, $top5Data = [];
    
    private $pagination = 3;

	
    public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

    public function mount()
	{
		$this->pageTitle = 'Listado en almacen';
		$this->componentName = 'Producto';
		$this->componentNames = 'Productos ';
		$this->categoryid = 'Elegir';
		$this->brandid = 'Elegir';
        //$this->ivaid = 'Elegir';
		//$this->ivaid = 'Elegir';
		//$this->wholesalerid = 'Elegir';
		$this->alertid = 'Elegir';
		$this->alertid = 'Elegir';
		$this->countryid = 'Elegir';
		$this->wholesalerid = 'Elegir';
		$this->proveedorid = 'Elegir';
		$this->shelfid = 'Elegir';
		$this->levelid = 'Elegir';
		//$this->type = 'Elegir';
		$this->type ='Elegir';

		$this->year = date('Y');
		
		
	}

    public function render()
    {
		//$this->getTop5();

        if(strlen($this->search) > 0)
		$data = Product::join('brands as b','b.id','products.brand_id')
		->join('users as use','use.id', 'products.user_id')
		->join('categories as c','c.id','products.category_id')
		//->join('companies as co', 'co.id','products.companie_id',)
		->join('wholesalers as w', 'w.id','products.wholesaler_id',)
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
			'w.name as wholesaler',
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
		->orderBy('products.name', 'asc')
		->paginate($this->pagination);
	else

		$data = Product::join('brands as b','b.id','products.brand_id')
		->join('categories as c','c.id','products.category_id')
		->join('users as use','use.id', 'products.user_id')
		//->join('companies as co', 'co.id','products.companie_id',)
		->join('wholesalers as w', 'w.id', 'products.wholesaler_id')
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
			'w.name as wholesaler',
			'p.name as proveedor',
			//'i.tax as iva',
			'co.name as country',
			's.name as shelf',
			'le.name as level'
			)
		->orderBy('products.name','asc')
		->paginate($this->pagination);


        return view('livewire.almacen.almacen',  [
			'data' => $data,
			'brands' => Brand::orderBy('name', 'asc')->get(),
            'categories' => Category::orderBy('name', 'asc')->get(),
            //'companies' => Companie::orderBy('name', 'asc')->get(),
			'wholesalers' => Wholesaler::orderBy('name', 'asc')->get(),
			'proveedors' => Proveedor::orderBy('name', 'asc')->get(),
            //'ivas' => Iva::orderBy('tax', 'asc')->get(),
			'alerts' => Alert::orderBy('name', 'asc')->get(),
			'countries' => Country::orderBy('name', 'asc')->get(),
			'shelves' => Shelf::orderBy('name', 'asc')->get(),
			'levels' => Level::orderBy('name', 'asc')->get()
		])
        ->extends('layouts.theme.app')
        ->section('content');;
    }

    public function Store()
	{
		$rules = [
            'name' => 'required|unique:products|min:3',
			'barcode' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'alertid' => 'required|not_in:Elegir',
            'brandid' => 'required|not_in:Elegir',            
            'categoryid' => 'required|not_in:Elegir',          
            //'ivaid' => 'required|not_in:Elegir',
			'countryid' => 'required|not_in:Elegir',
			'wholesalerid' => 'required|not_in:Elegir',
			'proveedorid' => 'required|not_in:Elegir',
			'shelfid' => 'required|not_in:Elegir',
			'levelid' => 'required|not_in:Elegir',
			'type' => 'required|not_in:Elegir',
			'seriecomprobante' => 'required',
			//'nuevoValor' =>'required'
        ];
        $messages = [
            'name.required' => 'El nombre del producto es requerido',
            'name.unique'=> 'El nombre del producto ya esta registrado',
            'name.min' => 'El nombre del producto debe tener por lo menos 3 digitos',
			'barcode.required' => 'Ingrese el codigo del producto',
            'cost.required' => 'EL costo es requerido',
            'price.required' => 'El precio es requerido',
            'stock.required' => 'El stock es requerido',
            'alertid.required' => 'El valor de inventario es requerido',
            'brandid.not_in' => 'La marca es requerida',
            'categoryid_not_in' => 'La categoria es requerida',       
            //'ivaid.not_in' => 'EL iva es requerido',
			'countryid.not_in' => 'El pais es requerido',
			'wholesalerid.not_in' => 'El mayorista es requerido',
			'proveedorid.not_in' => 'El proveedor es requerido',
			'shelfid.not_in' => 'El estante es requerido',
			'levelid.not_in' => 'El nivel es requerido',
			'type.not_in' => 'El tipo de comprobante es requerido',
			'seriecomprobante.required' => 'Ingrese la serie de comprobante',
			//'nuevoValor.required' => 'Ingrese un nuevo valor',
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

		$product = Product::create([
			'name' =>$this->name,
			'barcode' =>$this->barcode,
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
			'wholesaler_id' => $this->wholesalerid,
			'proveedor_id' => $this->proveedorid,
			'shelf_id' => $this->shelfid,
			'level_id' => $this->levelid,
			//'user_id' => $this->alejandramor
			'user_id' => Auth()->user()->id,
			'type'=>$this->type,
			'serie_comprobante' => $this->seriecomprobante,
		]);
//dd($product);
//$this->alejandra();
$this->StoreAlmacen();
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


	public function StoreAlmacen()
	{
		
		$rules = [
            //'name' => 'required|unique:products|min:3',
			//'barcode' => 'required',
            //'cost' => 'required',
            //'price' => 'required',
            //'stock' => 'required',
            //'alertid' => 'required|not_in:Elegir',
            //'brandid' => 'required|not_in:Elegir',            
            //'categoryid' => 'required|not_in:Elegir',          
            	//'ivaid' => 'required|not_in:Elegir',
			//'countryid' => 'required|not_in:Elegir',
			//'wholesalerid' => 'required|not_in:Elegir',
			//'proveedorid' => 'required|not_in:Elegir',
			//'shelfid' => 'required|not_in:Elegir',
			//'levelid' => 'required|not_in:Elegir',
			//'type' => 'required|not_in:Elegir',
			//'seriecomprobante' => 'required',
			//'nuevoValor' =>'required'
        ];
        $messages = [
            //'name.required' => 'El nombre del producto es requerido',
            //'name.unique'=> 'El nombre del producto ya esta registrado',
            //'name.min' => 'El nombre del producto debe tener por lo menos 3 digitos',
			//'barcode.required' => 'Ingrese el codigo del producto',
            //'cost.required' => 'EL costo es requerido',
            //'price.required' => 'El precio es requerido',
            //'stock.required' => 'El stock es requerido',
            //'alertid.required' => 'El valor de inventario es requerido',
            //'brandid.not_in' => 'La marca es requerida',
            //'categoryid_not_in' => 'La categoria es requerida',       
            	//'ivaid.not_in' => 'EL iva es requerido',
			//'countryid.not_in' => 'El pais es requerido',
			//'wholesalerid.not_in' => 'El mayorista es requerido',
			//'proveedorid.not_in' => 'El proveedor es requerido',
			//'shelfid.not_in' => 'El estante es requerido',
			//'levelid.not_in' => 'El nivel es requerido',
			//'type.not_in' => 'El tipo de comprobante es requerido',
			//'seriecomprobante.required' => 'Ingrese la serie de comprobante',
			//'nuevoValor.required' => 'Ingrese un nuevo valor',
        ];

		//$this->validate($rules, $messages);  
		

		// Fluent Query Builder
		//$users = DB::table('users')->where('username', '=', 'dayle')->get();
		//SELECT * FROM users WHERE username = 'dayle';

		//$graciela = DB::table('ivas')->where();
		
		
		//$graciela = Iva::all()->first();
		//$gracielaAlejandra = $graciela->tax;
		
		
		//dd($gracielaAlejandra);

		//$alejandraamor = Auth()->user()->id;
		//dd($alejandraamor);

		$almacen = Almacen::create([
			'name' =>$this->name,
			'barcode' =>$this->barcode,
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
			'wholesaler_id' => $this->wholesalerid,
			'proveedor_id' => $this->proveedorid,
			'shelf_id' => $this->shelfid,
			'level_id' => $this->levelid,
			//'user_id' => $this->alejandramor
			'user_id' => Auth()->user()->id,
			'type'=>$this->type,
			'serie_comprobante' => $this->seriecomprobante,
		]);
//dd($product);
		//if($this->image) 
		//{
		//	$customFileName = uniqid() . '_.' . $this->image->extension();
          //  $this->image->storeAs('public/products/', $customFileName);
           // $product->image = $customFileName;
            $almacen->save();
		//}

		$this->resetUI();
		$this->emit('product-added', 'Producto Registrado');
	}












	public function Edit(Product $product)
	{	
		
		//dd($product);
		$this->selected_id = $product->id;
		$this->name = $product->name;
		$this->barcode = $product->barcode;
		$this->cost = $product->cost;
		$this->price = $product->price;
		
//		$this->stock = $graciela;
		$this->stock = $product->stock;


		$this->alertid = $product->alert_id;
		$this->categoryid = $product->category_id;
		//$this->ivaid = $product->iva_id;
		$this->countryid = $product->countrie_id;
		$this->brandid = $product->brand_id;
		$this->wholesalerid = $product->wholesaler_id;
		$this->proveedorid = $product->proveedor_id;
		$this->shelfid = $product->shelf_id;
		$this->levelid = $product->level_id;
		$this->userid = $product->user_id;
		$this->image = $product->image;
		$this->type = $product->type;
		$this->seriecomprobante = $product->serie_comprobante;
		//dd($product->image);
		
		//dd($alejandra);

		$this->emit('modal-show','Show modal');
	}

	public function Update()	
	{		
		
		$rules = [
            //'name' => "required|min:3|unique:products,name,{$this->selected_id}",
            'cost' => 'required',
            'price' => 'required',
            'stock' => 'required',
            //'alertid' => 'required|not_in:Elegir',
            //'brandid' => 'required|not_in:Elegir',            
            //'categoryid' => 'required|not_in:Elegir',          
            		//'ivaid' => 'required|not_in:Elegir',
			//'wholesalerid' => 'required|not_in:Elegir',
			//'proveedorid' => 'required|not_in:Elegir',
			//'shelfid' => 'required|not_in:Elegir',
			//'levelid' => 'required|not_in:Elegir',
			//'type' => 'required|not_in:Elegir',
			//'seriecomprobante' => 'required',
			'nuevoValor' =>'required'
        ];
        $messages = [
            //'name.required' => 'El nombre del producto es requerido',
            //'name.unique'=> 'El nombre del producto ya esta registrado',
            //'name.min' => 'El nombre del producto debe tener por lo menos 3 digitos',
            'cost.required' => 'EL costo es requerido',
            'price.required' => 'El precio es requerido',
            'stock.required' => 'El stock es requerido',
            //'alertid.required' => 'El valor minimo de inventario es requerido',
            //'brandid.not_in' => 'La marca es requerida',
            //'categoryid.not_in' => 'La categoria es requerida',           
            //'ivaid.not_in' => 'EL iva es requerido',
			//'wholesalerid.not_in' => 'El mayorista es requerido',
			//'proveedorid.not_in' => 'El proveedor es requerido',
			//'shelfid.not_in' => 'El estante es requerido',
			//'levelid.not_in' => 'El nivel es requerido',
			//'type.not_in' => 'El tipo de comprobante es requerido',
			//'seriecomprobante.required' => 'Ingrese la serie de comprobante',
			'nuevoValor.required' => 'Ingrese un nuevo valor',
        ];

		$this->validate($rules, $messages);  

		//MAGIA
		//$product = Product::find($this->selected_id);
		
		
		//dd($product);
		$product = Almacen::create([
		//$product->update([ CON LA MAGIA
			'name' =>$this->name,
            'cost' =>$this->cost,
            'barcode' =>$this->barcode,
            'price' =>$this->price,

            //'stock' =>$this->stock,
			'stock' =>$this->nuevoValor,
			


            'alert_id' =>$this->alertid,
            'brand_id' =>$this->brandid,
            'category_id' =>$this->categoryid,           
            //'iva_id' =>$this->ivaid,
			'countrie_id' =>$this->countryid,
			'wholesaler_id' => $this->wholesalerid,
			'proveedor_id' => $this->proveedorid,
			'shelf_id' => $this->shelfid,
			'level_id' => $this->levelid,
			'user_id' => $this->userid,
			'type' => $this->type,
			'serie_comprobante' => $this->seriecomprobante,
		]);

		/**if($this->image) 
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
		} **/
		
		

		$product->save();

		$this->resetUI();
		$this->emit('product-updated', 'Producto Actualizado');


	}

	//public function alejandra(){$nirvana = 'Hola papi';	dd($nirvana);	}	



	public function resetUI()
	{
		$this->name = '';
        $this->barcode = '';
        $this->cost = '';
        $this->price = '';
        $this->stock = '';
        $this->alert_id = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->image = null;
        $this->brandid = 'Elegir';
        $this->categoryid = 'Elegir';
		$this->countryid = 'Elegir';
        //$this->ivaid = 'Elegir';
		$this->wholesalerid = 'Elegir';
		$this->proveedorid = 'Elegir';
		$this->shelfid = 'Elegir';
		$this->levelid = 'Elegir';
        $this->resetValidation(); 
		$this->type = 'Elegir';
		$this->seriecomprobante = '';
		$this->nuevoValor = '';

		//$this->actualizar();   //................................ llamamos a la funcion actualizar

	}

	protected $listeners =[
		'deleteRow' => 'Destroy'		
	];

	public function ScanCode($code)
	{
		$this->ScanearCode($code);
		$this->emit('global-msg',"SE AGREGÓ EL PRODUCTO AL CARRITO");
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

	public function actualizar(){
		$valorAlmacen = Almacen::get()->toArray();
		//dd($valorAlmacen);

		//$buscar = Almacen::where('name','Candado # 25')->first();
		//$quebuscar='1';
		//$buscar = Almacen::where('id','=', $quebuscar)->first();
		//dd($buscar);
		//$buscar = Almacen::where('id',1)->count();
		
		//$buscar = DB::table('almacens')->pluck('name', 'stock');		
		//$buscar = DB::table('almacens')->select('name', 'stock', 'price')->get();
		$buscar = DB::table('almacens')
			->select('name')
			//->groupByRaw('name, stock')
			->groupByRaw('name')
			->get();
		//dd($buscar);


		/** 
		 * dentro de almacen sumar todos los valores que se tiene de producto01, (X)
		 * SELECT almacens.name, COUNT(almacens.name), sum(almacens.stock) 
		 * FROM almacens 
		 * WHERE almacens.name = 'Candado # 25' 
		 * GROUP BY (NAME) */
//		$variable = 'Candado # 25';
$variable = 'cañeria'; //id 102
		//$variable = 'otro valor 4';
		//-------------------------------		
		$idvariable = Almacen::where('name','=', $variable)->select('id', 'name')->first();
		//dd($idvariable);
		//-------------------------------
				
		$listaProducto = DB::table('almacens')
		->selectRaw('almacens.name, count(almacens.name), sum(almacens.stock)')			
		->where('almacens.name', '=', $variable)	
		->groupBy('almacens.name')
		->get(); 
		//dd($listaProducto); // OBTENEMOS EL NOMBRE. CANTIDAD DE ITEMS, CANTIDAD DE LA SUMA DE ITEMS	

		/**
		 * buscar este producto dentro de  SALE_DETAILS.prodcuto01 y sacar el total de ventas(X)
		 *  SELECT product_id,COUNT(product_id), SUM(quantity), products.name
		*	FROM sale_details 
		*	INNER JOIN products ON products.id = sale_details.product_id
		*	GROUP BY(product_id)*/
		$variablebusqueda ='4';
		//$variablebusqueda = $variable;
		$listaSaleDetail = DB::table('sale_details')
		->join('products', 'products.id','=','sale_details.product_id')
		->selectRaw('sale_details.product_id, count(sale_details.product_id), sum(sale_details.quantity), products.name')		
		->where('products.id','=', $variablebusqueda)		
		->groupBy('sale_details.product_id')
		->get();
		//dd($listaSaleDetail);


		$valorBuscar = "8";
		$valorReemplazar = "100";

		//actualizando el registro
		$nuevo = Product::find($valorBuscar);
		$nuevo->stock = $valorReemplazar;
		$nuevo->save();			
		//dd($nuevo);
	}

/**
	public function getTop5()
    {
        
		$this->top5Data = $buscar = DB::table('almacens')
		->select(
			'name as product',
			DB::raw("COUNT(almacens.stock)AS total"),
			)
		//->groupByRaw('name, stock')
		->groupByRaw('name')
		->get();

		$contDif = (10 - count($this->top5Data));
        if ($contDif > 0) {
            for ($i = 1; $i <= $contDif; $i++) {
                array_push($this->top5Data, ["product" => "-", 'total' => 0]);
            }
        } 

        
    } */


























}
