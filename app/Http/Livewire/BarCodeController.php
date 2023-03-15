<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Iva;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Level;
use DB;

class BarCodeController extends Component
{
    public $product;
    public function render()
    {
        
        //$data = DB::Products('notes')->get();
        return view('livewire.barcode.barcode',[
            'data' => Product::orderBy('id','asc')->get(),
        ])       
        ->extends('layouts.theme.app')
        ->section('content');
    }
}