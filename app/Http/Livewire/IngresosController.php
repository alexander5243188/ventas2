<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Traits\CartTrait;

use App\Models\Category;
use App\Models\Product;
use App\Models\Ingresos;
use App\Models\Brand;
use App\Models\Companie;
use App\Models\User;
use App\Models\Iva;
use App\Models\Wholesaler;
use App\Models\Vaucher;
use App\Models\Alert;
use App\Models\Country;
use App\Models\Shelf;
use App\Models\Level;
use App\Models\Proveedor;

class IngresosController extends Component
{
    use WithPagination;
    public
        $componentName,
        $pageTitle,
        $search,
        $selected_id,
        //$name,
        $alejandraamor,
        $product,
        $name,
        $barcode,
        $cost,
        $price,
        $stock,
        $alertid,
        $categoryid,
        $countryid,
        $brandid,
        $wholesalerid,
        $proveedorid,
        $shelfid,
        $levelid,
        $userid,
        $image;


    private $pagination = 10;

    public function mount()
    {
        $this->componentName = 'Inventario';
        $this->pageTitle = 'Listado para actualizar precios y cantidades';
    }
    public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

    public function render()
    {
        if(strlen($this->search) > 0)
			$data = Product::where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->pagination);


		else
			$data = Ingresos::join('users as use', 'use.id','ingresos.user_id')
            ->join('products as p', 'p.id', 'ingresos.product_id')
            ->join('wholesalers as w', 'w.id', 'ingresos.wholesaler_id')
            ->join('vauchers as v', 'v.id', 'ingresos.vaucher_id')
            ->select(
                'Ingresos.*',
                'p.*',
                'use.name as user',
                'p.name as product',
                'p.stock as stock',
                'w.name as wholesaler',
                'v.name as vaucher'
            )
            ->orderBy('ingresos.id','asc')
            ->paginate($this->pagination);





            
        return view('livewire.ingresos.ingresos', [
            'data' =>$data
            ])
            ->extends('layouts.theme.app')
            ->section('content');
    }
    public function Edit(Product $product)
    {
        $this->selected_id = $product->id;
		$this->name = $product->name;
		$this->barcode = $product->barcode;
		$this->cost = $product->cost;
		$this->price = $product->price;
		$this->stock = $product->stock;
		$this->alertid = $product->alert_id;
		$this->categoryid = $product->category_id;		
		$this->countryid = $product->countrie_id;
		$this->brandid = $product->brand_id;
		$this->wholesalerid = $product->wholesaler_id;
		$this->proveedorid = $product->proveedor_id;
		$this->shelfid = $product->shelf_id;
		$this->levelid = $product->level_id;
		//$this->userid = $product->user_id;
		//$this->image = $product->image;
		

		$this->emit('modal-show','Show modal');
    }
    public function Update()
    {
        $product = Product::find($this->selected_id);
        $product->update([
			'name' =>$this->name,
            'cost' =>$this->cost,
            'barcode' =>$this->barcode,
            'price' =>$this->price,
            'stock' =>$this->stock,
            'alert_id' =>$this->alertid,
            'brand_id' =>$this->brandid,
            'category_id' =>$this->categoryid,           
            //'iva_id' =>$this->ivaid,
			'countrie_id' =>$this->countryid,
			'wholesaler_id' => $this->wholesalerid,
			'proveedor_id' => $this->proveedorid,
			'shelf_id' => $this->shelfid,
			'level_id' => $this->levelid,
			//'user_id' => $this->userid
		]);
        $product->save();
        $this->resetUI();
		$this->emit('product-updated', 'Producto Actualizado');
    }
    public function Store(){
        
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
			//'user_id' => $this->user_id
		]);
        $product->save();
        $this->resetUI();
		$this->emit('product-added', 'Producto Registrado');
    }

    public function Store2(Product $product)
    {
        $this->selected_id = $product->id;
        //dd($product->id);
        $alejandra = Product::find($product);
        //dd($alejandra);

        $product = Product::create([			
            'stock' =>$this->stock,           
		]);
        $product->save();
        $this->emit('modal-show','Categoría Registrada');
    }
    public function resetUI(){}
}
