<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Status;
use Livewire\WithPagination;
class StatusController extends Component
{
    use WithPagination;
    public 
        $name, 
        $search, 
        $selected_id, 
        $pageTitle, 
        $componentName;
    
        private $pagination = 5;

    public function mount()
    {       
        $this->componentName = "Estados";
    }
    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        if(strlen($this->search) > 0)
			$data = Status::where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->pagination);
		else
			$data = Status::orderBy('id','asc')
            ->paginate($this->pagination);

        return view('livewire.status.status', [
            'data' =>$data
            ])
        ->extends('layouts.theme.app')
        ->section('content');
    }
    public function Edit($id)
    {
        $record = Status::find($id, ['id', 'name']);
        $this->selected_id = $record->id;
        $this->name = $record->name;
        //dd($record);
        $this->emit('status-show-modal', 'Estado actualizado');
    }
    public function Update()
    {
        $rules =[
            'name' => "required|min:3|unique:statuses,name,{$this->selected_id}"
        ];
        $messages = [
            'name.required' => 'El nombre del estado es requerido',
            'name.min' => 'El nombre del estado por los menos tiene tres dígitos',
            'name.unique' => 'El estado ya existe',
        ];
        $this->validate($rules, $messages);
        $status = Status::find($this->selected_id);
        //dd($iva);
        $status->update([
            'name'=>$this->name,
        ]);
        $status->save();
        $this->resetUI();
        $this->emit('status-updated-modal', 'El  estado fue actualizado');
    }
    public function Store()
    {
        $rules =[
            'name' => "required|min:3|unique:statuses,name,{$this->selected_id}"
        ];
        $messages = [
            'name.required' => 'El nombre del estado es requerido',
            'name.min' => 'El nombre del estado por los menos tiene tres dígitos',
            'name.unique' => 'El estado ya existe',
        ];
        $this->validate($rules, $messages);
        $status = Status::create([
			'name' =>$this->name,            
		]);
        $status->save();
        $this->resetUI();
        $this->emit('status-create-modal', 'El estado fue creado');
    }
    protected $listeners =[
		'deleteRow' => 'Destroy'		
	];

    public function resetUI()
    {
        $this->name = '';        
        $this->resetValidation();
    }
    public function Destroy(Status $status)
	{		
		$status->delete();	

		$this->resetUI();
		$this->emit('status-deleted-modal', 'Estado Eliminado');
	}
}
