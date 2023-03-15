<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Type;
use Livewire\WithPagination;

class TypeController extends Component
{
    use WithPagination;
    public 
        $name, 
        $selected_id, 
        $search, 
        $pageTitle, 
        $componentName;
    
    private $pagination = 5;

    public function mount()
    {
        $this->componentName = "Lista de las denominaciones";
    }
    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        if(strlen($this->search) > 0)
            $data = Type::where('name', 'like', '%' . $this->search .'%')
            ->paginate($this->pagination);
        else  
            $data = Type::orderBy('id', 'asc')
            ->paginate($this->pagination);

        return view('livewire.type.type',[
            'data'=>$data
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }
}
