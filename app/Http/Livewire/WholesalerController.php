<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wholesaler;
use App\Models\Department;
use Livewire\WithPagination;

class WholesalerController extends Component
{
    use WithPagination;

    public 
        $name,
        $phone,
        $addres,
        $nit,
        $email,
        $description,
        $departmentid,
        $search,
        $selected_id,
        $pagetitle,
        $componentName,
        $componentNames;


    private $pagination = 5;
    
    public function mount()
    {   
        $this->componentName = "Proveedor";
        
    }
    public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

    public function render()
    {
        if(strlen($this->search) > 0)
        $data = Wholesaler::join('departments as d','d.id', 'wholesalers.department_id')
            ->select(
                'wholesalers.*',
                'd.name as department'
                )
            ->where('wholesalers.name', 'like', '%' . $this->search .'%')
            ->orWhere('wholesalers.description', 'like', '%' . $this->search .'%')
            ->orderBy('wholesalers.name', 'asc')
            ->paginate($this->pagination);

		else
			$data = Wholesaler::join('departments as d','d.id', 'wholesalers.department_id')
            ->select(
                'wholesalers.*',
                'd.name as department'
                )
            ->orderBy('wholesalers.name', 'asc')
            ->paginate($this->pagination);


        return view('livewire.wholesaler.wholesaler', [
            'data' => $data,
            'departments' => Department::orderBy('name', 'asc')->get()
            ])
        ->extends('layouts.theme.app')
		->section('content');
    }

  

    //----A-----public function Edit($id)
    public function Edit(Wholesaler $wholesaler)
	{
        //dd($id);
        // ----A---$wholesaler = Wholesaler::find($id, ['id','name','phone', 'email', 'addres', 'nit', 'description', 'department_id']);
		$this->selected_id = $wholesaler->id;
		$this->name = $wholesaler->name;
		$this->phone = $wholesaler->phone;
		$this->email = $wholesaler->email;
		$this->addres = $wholesaler->addres;
        $this->nit = $wholesaler->nit;
		$this->description = $wholesaler->description;
		$this->departmentid = $wholesaler->department_id;
		
        $this->emit('editar','Show modal');
	}
   
    public function Store()
	{
		$rules = [
            'name' => 'required|unique:products|min:3',
            'phone' => 'required',           
            'departmentid' => 'required|not_in:Elegir'
        ];
        $messages = [
            'name.required' => 'El nombre del mayorista es requerido',
            'name.unique'=> 'El nombre del mayorista ya esta registrado',
            'name.min' => 'El nombre del mayorista debe tener por lo menos 3 digitos',
            'phone.required' => 'EL numero telefonico es requerido',            
            'department.not_in' => 'EL departamento es requerido'
        ];
		$this->validate($rules, $messages);
		$wholesaler = Wholesaler::create([
			'name' =>$this->name,
            'phone' =>$this->phone,
            'email' =>$this->email,
            'addres' =>$this->addres,
            'description' =>$this->description,            
            'department_id' =>$this->departmentid
		]);
        //dd($wholesaler);
        $wholesaler->save();
		$this->resetUI();
		$this->emit('wholesaler-added', 'Mayorista Registrado');
	}
    public function Update()
	{
		$rules = [
            'name' => "required|min:3|unique:products,name,{$this->selected_id}",
            'phone' => 'required',            
            'departmentid' => 'required|not_in:Elegir'
        ];
        $messages = [
            'name.required' => 'El nombre del mayorista es requerido',
            'name.unique'=> 'El nombre del mayorista ya esta registrado',
            'name.min' => 'El nombre del mayorista debe tener por lo menos 3 digitos',
            'phone.required' => 'EL numero telefonico es requerido',            
            'departmentid.not_in' => 'El departamento es requerido'
        ];
		$this->validate($rules, $messages);

		$wholesaler = Wholesaler::find($this->selected_id);

		$wholesaler->update([
			'name' =>$this->name,
            'phone' =>$this->phone,
            'email' =>$this->email,
            'addres' =>$this->addres,
            'nit' =>$this->nit,
            'description' =>$this->description,            
            'department_id' =>$this->departmentid
		]);
        //dd($wholesaler);
        $wholesaler->save();
		$this->resetUI();

		$this->emit('wholesaler-updated', 'Datos de mayorista actualizado');
	}

    protected $listeners =[
		'deleteRow' => 'Destroy'		
	];

	public function Destroy(Wholesaler $wholesaler)
	{
		//dd($product);		
		$wholesaler->delete();	

		$this->resetUI();
		$this->emit('wholesaler-deleted', 'Proveedor Eliminado');
	}
    
    public function resetUI(){
        $this->name = '';
        $this->phone = '';
        $this->email = '';
        $this->addres = '';
        $this->nit = '';
        $this->description = '';
        $this->departmentid ='0';
    }

}

