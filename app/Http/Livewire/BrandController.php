<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Brand;
//use App\Models\Country;
use Livewire\WithPagination;
use App\Models\User;

class BrandController extends Component
{
    use WithPagination;

    public 
        $name, 
        //$country_id,  
        $search, 
        $selected_id, 
        $pageTitle, 
        $componentName,     
        $userid;
    private $pagination = 5;

    public function mount()
    {
        $this->pageTitle = "Listado";
        $this->componentName = "Marca";      
        //$this->country_id = 'Elegir';
    }
    public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

    public function render()
    {
        if(strlen($this->search) > 0)
			$data = Brand::join('users as use', 'use.id','brands.user_id')
			->select(
				'brands.*',
				'use.name as user'
			)
            ->where('brands.name', 'like', '%' . $this->search . '%')
            ->paginate($this->pagination);
		else
			$data = Brand::join('users as use', 'use.id','brands.user_id')
			->select(
				'brands.*',
				'use.name as user'
			)
            ->orderBy('brands.id','asc')
            ->paginate($this->pagination);
        
        //if(strlen($this->search) > 0)
		//	$data = Brand::join('countries as c', 'c.id', 'brands.country_id')
        //    ->select('brands.*','c.name as country' )
        //    ->where('brands.name', 'like', '%' .$this->search . '%')
        //    ->paginate($this->pagination);
		//else
		//	$data = Brand::join('countries as c', 'c.id', 'brands.country_id')
        //    ->select('brands.*',             'c.name as country'            )
        //    ->orderBy('brands.name')
        //    ->paginate($this->pagination); 

        return view('livewire.brand.brand',[
            'data' => $data,
            //'countries' => Country::orderBy('name', 'asc')->get()
            ])
        ->extends('layouts.theme.app')
        ->section('content');
    }
    public function Edit($id)
    {
		//$record = Brand::find($id, ['id','name', 'country_id']);
        $record = Brand::find($id, ['id','name']);
        $this->selected_id = $record->id;
		$this->name = $record->name;
       // $this->country_id = $record->country_id;		
        //dd($record);

		$this->emit('show-modal', 'show modal!');
	}   
    public function Update()
    {
		$rules =[
			'name' => "required|min:2|unique:brands,name,{$this->selected_id}"
		];

		$messages =[
			'name.required' => 'Nombre de la marca es requerido',
			'name.min' => 'El nombre de la marca debe tener al menos 2 caracteres',
			'name.unique' => 'El nombre de la marca ya existe'
		];

		$this->validate($rules, $messages);


		$brand = Brand::find($this->selected_id);
		$brand->update([
			'name' => $this->name,
            'user_id' => Auth()->user()->id,
		]);
        $brand->save();	        
		$this->resetUI();
		$this->emit('brand-updated', 'Producto Actualizada');
	}
    public function Store()
    {
        $rules = [
            'name' => 'required|unique:brands|min:2',
            //'country_id' => 'required|not_in:Elegir'
        ];
        $messages = [
            'name.required' => 'Nombre de la marca es requerido',
            'name.unique' => 'La marca ya esta registrado',
            'name.min' => 'La marca debe contener por lo menos 2 caracteres',
            //'country_id.required' => 'El país es requerido'
        ];
        $this->validate($rules, $messages);
        $brand = Brand::create([
            'name' => $this->name,
            'user_id' => Auth()->user()->id,
            //'country_id' => $this->country_id,
        ]);
        //dd($brand);
        $brand->save();
        $this->resetUI();
        $this->emit('brand-added', 'Marca registrada correctamente');
    }
    protected $listeners =[
        'deleteRow' => 'Destroy'
    ];
    public function Destroy(Brand $brand)
    {
        $brand->delete();
        $this->resetUI();
        $this->emit('brand-deleted-modal','Marca eliminada correctamente');
    }
    public function resetUI()
    {
        $this->name = '';
        $this->resetValidation();
    }

}
