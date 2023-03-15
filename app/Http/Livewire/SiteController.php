<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Product;

class SiteController extends Component
{
    //
    public function render()
    { 
       
       
        return view('livewire.nirvana.nirvana',[
            'data' => Product::orderBy('id','asc')->get(),
            ])
        ->extends('layouts.theme.app')
        ->section('content');
    }
}
