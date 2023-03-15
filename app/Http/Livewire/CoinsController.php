<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class CoinsController extends Component
{
   
	use WithFileUploads;
	use WithPagination;

	public 
		//$type,
		$typeid,
		$value, 
		$search, 
		$image, 
		$selected_id, 
		$pageTitle, 
		$componentName,
		$componentNames;
	private $pagination = 5;

	
	public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'una denominacion';
		$this->componentNames = 'Denominaciones';
		//$this->type ='Elegir';
		$this->typeid='Elegir';
	}

	public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}


    public function render()
    {
    	if(strlen($this->search) > 0)
    		$data = Denomination::join('types as t', 't.id', 'denominations.type_id')
			->select(
				'denominations.*',
				't.name as type'
			)
			->where('denominations.value', 'like', '%' . $this->search . '%')
			->orWhere('t.name', 'like', '%' . $this->search . '%')
			->orderBy('denominations.id', 'asc')
			->paginate($this->pagination);
    	else
			$data = Denomination::join('types as t', 't.id', 'denominations.type_id')
			->select(
				'denominations.*',
				't.name as type'
			)			
			->orderBy('denominations.id', 'asc')
			->paginate($this->pagination);



        return view('livewire.denominations.component', [
			'data' => $data,
			'type' => Type::orderBy('name', 'asc')->get()
			])
        ->extends('layouts.theme.app')
        ->section('content');
    }


    
    public function Edit($id)
    {
    	$record = Denomination::find($id, ['id','type_id','value','image']);
    	$this->typeid = $record->type_id;
    	$this->value = $record->value;
    	$this->selected_id = $record->id;
    	$this->image = $record->image;

    	$this->emit('show-modal', 'show modal!');
    }



    public function Store()
    {
    	$rules = [
    		'typeid' => 'required|not_in:Elegir',
    		'value' => 'required|unique:denominations'
    	];

    	$messages = [
    		'typeid_not_in' => 'El tipo es requerido',
    		'value.required' => 'El valor es requerido',  
    		'value.unique'  => 'Ya existe el valor'
    	];

    	$this->validate($rules, $messages);
		
    	$denomination = Denomination::create([
    		'type_id' => $this->typeid,
    		'value' => $this->value
    	]);

    	
    	if($this->image)
    	{
    		$customFileName = uniqid() . '_.' . $this->image->extension();
    		$this->image->storeAs('public/denominations', $customFileName);
    		$denomination->image = $customFileName;
    		$denomination->save();
    	}

    	$this->resetUI();
    	$this->emit('item-added','Denominación Registrada');

    }


    public function Update()
    {
    	$rules =[
    		'typeid' => 'required|not_in:Elegir',
    		'value' => "required|unique:denominations,value,{$this->selected_id}"
    	];

    	$messages =[    		
    		'typeid.not_in' => 'Elige un tipo válido',
    		'value.required' => 'El valor es requerido',
    		'value.unique' => 'El valor ya existe'
    	];

    	$this->validate($rules, $messages);


    	$denomination = Denomination::find($this->selected_id);
    	$denomination->update([
    		'type_id' => $this->typeid,
    		'value' => $this->value
    	]);

    	if($this->image)
    	{
    		$customFileName = uniqid() . '_.' . $this->image->extension();
    		$this->image->storeAs('public/denominations', $customFileName);
    		$imageName = $denomination->image;

    		$denomination->image = $customFileName;
    		$denomination->save();

    		if($imageName !=null)
    		{
    			if(file_exists('storage/denominations' . $imageName))
    			{
    				unlink('storage/denominations' . $imageName);
    			}
    		}

    	}

    	$this->resetUI();
    	$this->emit('item-updated', 'Denominación Actualizada');



    }


    public function resetUI() 
    {
    	$this->type_id ='Elegir';
    	$this->value ='';
    	$this->image = null;
    	$this->search ='';
    	$this->selected_id =0;
		$this->resetValidation(); 
    }


	protected  $listeners = [
		'deleteRow' => 'Destroy'
	];

    public function Destroy(Denomination $denomination)
    {   	
    	
    	$imageName = $denomination->image; 
    	$denomination->delete();

    	if($imageName !=null) {
    		unlink('storage/denominations/' . $imageName);
    	}

    	$this->resetUI();
    	$this->emit('item-deleted', 'Denominación Eliminada');

    }



}


