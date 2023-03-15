<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Proveedor;
use App\Models\Department;
use Livewire\WithPagination;

class ProveedorController extends Component
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
        $pageTitle,
        $componentName;
    
    private $pagination = 5;
    
    public function mount()
    {   
        $this->componentName = "Proveedor";
        $this->pageTitle = "Lista";
        
    }

    public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

    public function render()
    {
        if(strlen($this->search) > 0)
        $data = Proveedor::join('departments as d','d.id', 'proveedors.department_id')
            ->select(
                'proveedors.*',
                'd.name as department'
                )
            ->where('proveedors.name', 'like', '%' . $this->search .'%')
            ->orWhere('proveedors.description', 'like', '%' . $this->search .'%')
            ->orderBy('proveedors.name', 'asc')
            ->paginate($this->pagination);

            else
                $data = Proveedor::join('departments as d','d.id', 'proveedors.department_id')
                ->select(
                    'proveedors.*',
                    'd.name as department'
                    )
                ->orderBy('proveedors.name', 'asc')
                ->paginate($this->pagination);



        return view('livewire.proveedor.proveedor',[
            'data' => $data,
            'departments' => Department::orderBy('name', 'asc')->get()
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }



    
   
    public function Store()
	{        
		$rules = [
            'name' => 'required|unique:products|min:3',
            'phone' => 'required',           
            'departmentid' => 'required|not_in:Elegir'                        
        ];
        $messages = [
            'name.required' => 'El nombre del proveedor es requerido',
            'name.unique'=> 'El nombre del proveedor ya esta registrado',
            'name.min' => 'El nombre del proveedor debe tener por lo menos 3 digitos',
            'phone.required' => 'EL numero telefonico es requerido',            
            'departmentid.not_in' => 'EL departamento es requerido'                        
        ];
		$this->validate($rules, $messages);
		$proveedor = Proveedor::create([
			'name' =>$this->name,
            'phone' =>$this->phone,
            'email' =>$this->email,
            'addres' =>$this->addres,
            'description' =>$this->description,            
            'department_id' =>$this->departmentid
		]);
        //dd($proveedor);
        $proveedor->save();
		$this->resetUI();
		$this->emit('product-added', 'Producto Registrado');
	}

    public function Edit(Proveedor $proveedor)
	{
        //dd($proveedor);
        //$proveedor = Proveedor::find($id, ['id','name','phone', 'email', 'addres', 'nit', 'description', 'department_id']);
		$this->selected_id = $proveedor->id;
		$this->name = $proveedor->name;
		$this->phone = $proveedor->phone;
		$this->email = $proveedor->email;
		$this->addres = $proveedor->addres;
        $this->nit = $proveedor->nit;
		$this->description = $proveedor->description;
		$this->departmentid = $proveedor->department_id;
        
        
        $this->emit('modal-show','Show modal');
        
	}

    public function Update()
	{
		$rules = [
            'name' => "required|min:3|unique:products,name,{$this->selected_id}",
            'phone' => 'required',            
            'departmentid' => 'required|not_in:Elegir'
        ];
        $messages = [
            'name.required' => 'El nombre del proveedor es requerido',
            'name.unique'=> 'El nombre del proveedor ya esta registrado',
            'name.min' => 'El nombre del proveedor debe tener por lo menos 3 digitos',
            'phone.required' => 'EL numero telefonico es requerido',            
            'departmentid.not_in' => 'El departamento es requerido'
        ];
		$this->validate($rules, $messages);

		$proveedor = Proveedor::find($this->selected_id);

		$proveedor->update([
			'name' =>$this->name,
            'phone' =>$this->phone,
            'email' =>$this->email,
            'addres' =>$this->addres,
            'nit' =>$this->nit,
            'description' =>$this->description,            
            'department_id' =>$this->departmentid
		]);
        //dd($proveedor);
        
        $proveedor->save();
		$this->resetUI();      
		$this->emit('product-updated', 'Producto Actualizado');
	}
/***************************** */
public function Editar(Proveedor $proveedor){
    $this->selected_id = $proveedor->id;
		$this->name = $proveedor->name;
		$this->phone = $proveedor->phone;
		$this->email = $proveedor->email;
		$this->addres = $proveedor->addres;
        $this->nit = $proveedor->nit;
		$this->description = $proveedor->description;
		$this->departmentid = $proveedor->department_id;
        
        
        $this->emit('alejandra','Show modal');
}

/****************************** */



    public function resetUI(){
        $this->name = '';
        $this->phone = '';
        $this->email = '';
        $this->addres = '';
        $this->nit = '';
        $this->description = '';
        $this->departmentid = 0;
        $this->selected_id = 0;
    }
}
