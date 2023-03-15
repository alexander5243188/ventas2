<?php

namespace App\Http\Livewire;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Denomination;
use App\Models\SaleDetail;
use Livewire\Component;

use App\Traits\CartTrait;
use App\Models\Product;
use App\Models\Sale;
use DB;
use App\Models\Almacen;
use App\Models\Client;

use App\Models\Alert;

use Carbon\Carbon;
use PDF;


use Mike42\Escpos\Printer; 
use Mike42\Escpos\EscposImage; 
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

class PosController extends Component
{	
	use CartTrait;

	public 
		$total,
		$itemsQuantity, 
		$efectivo, 
		$change, 
		$t, 
		$nombre_cliente, 
		$cedula_cliente,
		$fechaAlmacen,
		$tipoSalida;


	public function mount()
	{
		$this->efectivo =0;
		$this->change =0;
		$this->total  = Cart::getTotal();
		$this->itemsQuantity = Cart::getTotalQuantity();

		$this->fechaAlmacen = '';
		$this->tipoSalida= 'SALIDA';	
		
	}

	public function render()
	{		
		
		return view('livewire.pos.component', [
			'denominations' => Denomination::orderBy('id','asc')->get(),
			'cart' => Cart::getContent()->sortBy('name')
		])
		->extends('layouts.theme.app')
		->section('content');
	}

	// agregar efectivo / denominations
	public function ACash($value)
	{
		$this->efectivo += ($value == 0 ? $this->total : $value);
		$this->change = ($this->efectivo - $this->total);
	}
	public function limpiar(){$this->change = 0;}

	// escuchar eventos
	protected $listeners = [
		'scan-code'  =>  'ScanCode',
		'removeItem' => 'removeItem',
		'clearCart'  => 'clearCart',
		'saveSale'   => 'saveSale',
		'refresh' => '$refresh',
		'print-last' => 'printLast',
		'scan-code-byid'=> 'ScanCodeById'
	];

	public function ScanCodeById(Product $product)
	{
		$this->IncreaseQuantity($product);
	}


	// buscar y agregar producto por escaner y/o manual
	public function ScanCode($barcode, $cant = 1)
	{
		$this->ScanearCode($barcode, $cant);
	}

	// incrementar cantidad item en carrito
	public function increaseQty(Product $product, $cant = 1)
	{		
		$this->IncreaseQuantity($product, $cant);	
	}

	// actualizar cantidad item en carrito
	public function updateQty(Product $product, $cant = 1)
	{
		if($cant <=0)
			$this->removeItem($product->id);
		else
			$this->UpdateQuantity($product, $cant);	
	}

	// decrementar cantidad item en carrito
	public function decreaseQty($productId)
	{
		$this->decreaseQuantity($productId);	
	}

	// vaciar carrito
	public function clearCart()
	{
		$this->trashCart();
	}


	// guardar venta
	public function saveSale()
	{		
		if($this->total <=0)
		{
			$this->emit('sale-error','AGEGA PRODUCTOS A LA VENTA');
			return;
		}
		if($this->efectivo <=0)
		{
			$this->emit('sale-error','INGRESA EL EFECTIVO');
			return;
		}
		if($this->total > $this->efectivo)
		{
			$this->emit('sale-error','EL EFECTIVO DEBE SER MAYOR O IGUAL AL TOTAL');
			return;
		}

		DB::beginTransaction();

		try {

			$sale = Sale::create([
				'total' => $this->total,
				'items' => $this->itemsQuantity,
				'cash' => $this->efectivo,
				'change' => $this->change,
				'user_id' => Auth()->user()->id,
				'nombrecliente' => $this->nombre_cliente,
				'cedulacliente' => $this->cedula_cliente,
				'nombrevendedor' => Auth()->user()->name,
			]);
			
			if($sale) 
			{
				$items = Cart::getContent();
				foreach ($items as  $item) {					
					SaleDetail::create([
						'price' => $item->price,
						'quantity' => $item->quantity,
						'product_id' => $item->id,						
						'producto' => $item->name,
						'sale_id' => $sale->id,
						'usuario_id' => Auth()->user()->id,				
					]);
					$idProveedor = Product::find($item->id);						
					//dd($idProveedor->proveedor_id);
					Almacen::create([
						'fecha'=> Carbon::now()->format('Y-m-d'),
						'product_id' => $item->id,
						'proveedor_id' => $idProveedor->proveedor_id,
						'producto' => $idProveedor->name,
						'stock' => $item->quantity,
						'stockS' => $item->quantity,
						'salida' => $this->tipoSalida,
						'nombrevendedor' => Auth()->user()->name
					]);					
					// ---------------------------------------------registrar dato en almacen	
					$idregistroventa = $item->id;
					//dd($idregistroventa);
					
					$idProducto = Product::find($idregistroventa);
					//dd($idProducto->name);

					//dd($product->id);
					
					//dd($almacen);
					//*********************************************************************** */

					// ---------------------------------------------registrar dato de cliente	
					Client::create([
						'name' => $this->nombre_cliente,
						'ci' => $this->cedula_cliente
					]);	

					// ---------------------------------------------

					//update stock
					$product = Product::find($item->id);
					$product->stock = $product->stock - $item->quantity;
					$this->printLast();

					$product->save();
									
					
				}

			}


			DB::commit();
				
			Cart::clear();
			$this->efectivo =0;
			$this->change =0;
			$this->total = Cart::getTotal();
			$this->itemsQuantity = Cart::getTotalQuantity();
			$this->emit('sale-ok','Venta registrada con éxito');
			//$this->imprimirPDF();			
			$this->emit('print-ticket', $sale->id);
			//$this->emit('imprimir','hola');
			$this->resetUI();

			

			
		} catch (Exception $e) {
			DB::rollback();			
			$this->emit('sale-error', $e->getMessage());
		}
		
	}
	public function imprimirPDF(){return \Redirect::to('/rutaAlejandra/pdf');}


	public function printTicket($ventaId)
	{		
		return \Redirect::to("print://$ventaId");

	}

   //*************************************************************** */
	public function printLast()
	{
		$lastSale = Sale::latest()->first();
		//$lastSale = SaleDetail::latest()->first();
		//dd("+++++++".$lastSale);		
		if($lastSale)		
			$this->emit('print-last-id', $lastSale->id);
	}
	//*************************************************************** */
	public function printRecibo()
	{
		$folio="67531425";
		$empresa="COMERCIAL FUENTES";
		$nombreImpresiora = 'epson120';
		$connector = new WindowsPrintConnector('epson120');
		$impresora = new Printer($connector);

		//***************obtener la infor de la db */
		$lastSale = Sale::latest()->first();
		$lastSaleDetail = SaleDetail::latest()->first();

		//----------informacion del ticket
		$impresora->setJustification(Printer::JUSTIFY_CENTER);
		$impresora->setTextSize(2,2);
		$impresora->text(strtoupper("COMERCIAL FUENTES\n"));
		$impresora->setTextSize(1,1);
		$impresora->text("Recibo\n\n");
		$impresora->setJustification(Printer::JUSTIFY_LEFT);
		$impresora->text("============================================\n");
		$impresora->text("Producto: $lastSaleDetail->producto");
		$impresora->text("Producto: $lastSaleDetail->price");
		$impresora->text("Fecha:". Carbon::parse($lastSale->created_at)->format('d/m/Y h:m:s') . "\n");
		$impresora->text("============================================\n");
		
		/*** footer */
		$impresora->setJustification(Printer::JUSTIFY_CENTER);
		$impresora->text("Sin credito fiscal");

		$impresora->selectPrintMode();
		$impresora->setBarcodeHeight(80); //altura del barccode
		$impresora->barcode($folio, Printer::BARCODE_CODE39);
		$impresora->feed(2); //los saltos de linea

		$impresora->text("Gracias por su preferencia");
		$impresora->feed(3);
		$impresora->cut(); //para que corte la impresora
		$impresora->close(); //cerrar conexxion
	}
	//************************************************************** */
	public function resetUI()
	{
		//$saludo = 'hola';
		//dd($saludo);
		$this->nombre_cliente = '';
		$this->cedula_cliente = '';
	}


	
	public function claseCrearAlejandraPDF(){
        //Recuperar todos los productos de la db
        $productos = Alert::all();
       
        

        view()->share('productos', $productos);
        $pdf = PDF::loadView('recibo', $productos);

        return $pdf->download('archivo-pdf.pdf');

    }

}

