<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\ExportControllerA;

use App\Http\Livewire\AsignarController;
use App\Http\Livewire\CashoutController;
use App\Http\Livewire\CategoriesController;
use App\Http\Livewire\CoinsController;
use App\Http\Livewire\Component1;
use App\Http\Livewire\DashController;
use App\Http\Livewire\ImportController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\PosController;
use App\Http\Livewire\ProductsController;


use App\Http\Livewire\ReportsController;
use App\Http\Livewire\RolesController;
use App\Http\Livewire\Select2;
use App\Http\Livewire\UsersController;
use App\Http\Livewire\InventoryController;
use App\Http\Livewire\BrandController;
use App\Http\Livewire\WholesalerController;
use App\Http\Livewire\CountryController;
use App\Http\Livewire\DepartmentController;
use App\Http\Livewire\IvaController;
use App\Http\Livewire\AlertController;
use App\Http\Livewire\TypeController;
use App\Http\Livewire\StatusController;
use App\Http\Livewire\ClientController;

use App\Http\Livewire\BarCodeController;
use App\Http\Livewire\SiteController;

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\ProveedorController;
use App\Http\Livewire\IngresosController;
use App\Http\Livewire\AlmacenController;

use App\Http\Livewire\ReportalmacensController;

use App\Http\Livewire\ProductoController;

use App\Http\Livewire\Dash;

Route::get('/', function () {
    return view('auth.login');
});

//Auth::routes();

Auth::routes(['register' => false]); // deshabilitamos el registro de nuevos users

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', Dash::class);
//Route::get('/home', UsersController::class);
Route::get('/home', SiteController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('roles', RolesController::class)->middleware('role:Admin');
    Route::get('permisos', PermisosController::class)->middleware('role:Admin');
    Route::get('asignar', AsignarController::class)->middleware('role:Admin');
    Route::get('coins', CoinsController::class)->middleware('role:Admin');
    Route::get('users', UsersController::class)->middleware('role:Admin');
    Route::get('inventory', InventoryController::class)->middleware('role:Admin');
    Route::get('brands', BrandController::class)->middleware('role:Admin');
    Route::get('wholesalers', WholesalerController::class)->middleware('role:Admin');
    Route::get('country', CountryController::class)->middleware('role:Admin');
    Route::get('department',DepartmentController::class)->middleware('role:Admin');
    Route::get('iva',IvaController::class)->middleware('role:Admin');
    Route::get('alert',AlertController::class)->middleware('role:Admin');
    Route::get('type',TypeController::class)->middleware('role:Admin');
    Route::get('status',StatusController::class)->middleware('role:Admin');
    Route::get('client',ClientController::class)->middleware('role:Admin');
    Route::get('categories', CategoriesController::class)->middleware('role:Admin');
    Route::get('products', ProductsController::class);    
 
    Route::get('pos', PosController::class);
    Route::get('dash', DashController::class);
    //Route::get('dash', Dash::class)->name('dash');

    Route::get('barcode', BarcodeController::class)->middleware('role:Admin');
    Route::get('proveedor', ProveedorController::class);
    Route::get('ingreso', IngresosController::class)->middleware('role:Admin');
    Route::get('almacen', AlmacenController::class);

    Route::get('nirvana',SiteController::class);

    Route::group(['middleware' => ['role:Admin']], function () {
          
    });
    
    Route::get('cashout', CashoutController::class);
    Route::get('reports', ReportsController::class);    
    Route::get('import', ImportController::class);

    Route::get('reportalmacen', ReportalmacensController::class);

    //reportes PDF
    Route::get('report/pdf/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reportPDF']);
    Route::get('report/pdf/{user}/{type}', [ExportController::class, 'reportPDF']);

    //reportes PDF
    Route::get('reportalmacen/pdf/{product}/{type}/{f1}/{f2}', [ExportControllerA::class, 'reportPDF']);
    Route::get('reportalmacen/pdf/{product}/{type}', [ExportControllerA::class, 'reportPDF']);
    Route::get('reportticket/pdf/{product}', [ExportControllerA::class, 'reportPDF']);


    Route::get('/alejandra', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/rutaAlejandra/pdf', [ProductoController::class, 'claseCrearAlejandraPDF'])->name('producto.pdf');
    

   
   
});























Route::get('conte', Component1::class);
Route::get('conte2', function(){
    return view('contenedor');
});



//rutas utils
Route::get('select2', Select2::class);
