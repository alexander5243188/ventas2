<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;

class ClientController extends Component
{
    use WithPagination;
    public
        $name,
        $componentName,
        $pageTitle,
        $search,
        $selected_id;

    private $pagination = 5;

    public function mount()
    {
        $this->componentName = 'Registro';
        $this->pageTitle = 'Clientes';
    }
    public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

    public function render()
    {
        if(strlen($this->search) > 0)
			$data = Client::where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->pagination);
		else
			$data = Client::orderBy('id','desc')
            ->paginate($this->pagination);

        return view('livewire.cliente.componente', [
            'data' =>$data
            ]) 
        ->extends('layouts.theme.app')
        ->section('content');
    }
}
