<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alert;
use Livewire\WithPagination;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;


class AlertController extends Component
{
    use WithPagination;
    public
        $name,
        $componentName,
        $search,
        $selected_id;

    private $pagination = 5;

    public function mount()
    {
        $this->componentName = 'Alertas';
    }

    public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

    public function render()
    {
        if(strlen($this->search) > 0)
			$data = Alert::where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->pagination);
		else
			$data = Alert::orderBy('id','desc')
            ->paginate($this->pagination);
            
        return view('livewire.alert.alert', [
            'data' =>$data
            ])
        ->extends('layouts.theme.app')
        ->section('content');
    }
    
    public function Edit($id)
    {
        $record = Alert::find($id, ['id', 'name']);
        $this->selected_id = $record->id;
        $this->name = $record->name;
        //dd($record);
        $this->emit('alert-show-modal', 'Editando alerta');
    }
    public function Update()
    {
        $rules =[
            'name' => "required|min:2|unique:alerts,name,{$this->selected_id}"
        ];
        $messages = [
            'name.required' => 'El valor de la alerta es requerido',
            'name.min' => 'El valor de la alerta por los menos tiene dos dígitos',
            'name.unique' => 'El valor de la alerta ya existe',
        ];
        $this->validate($rules, $messages);
        $alert = Alert::find($this->selected_id);
        //dd($alert);
        $alert->update([
            'name'=>$this->name,
        ]);
        $alert->save();
        $this->resetUI();
        $this->emit('alert-updated-modal', 'El valor de la alerta fue actualizado');
    }
    public function Store()
    {
        $rules = [
            'name' => 'required|unique:alerts|min:2'
        ];

        $messages = [
            'name.required' => 'El valor de la alerta es requerido',
            'name.unique' => 'Ya existe el valor de la alerta',
            'name.min' => 'El nombre de la alerta debe tener al menos 2 caracteres'
        ];

        $this->validate($rules, $messages);
        
        $valor = Str::limit($this->name,2,'');
        $cadena = Str::finish( 'aler-',$valor);
    
        //dd($nirvana);

        $alert = Alert::create([
            'name' => $this->name ,
            'alert_id' => $cadena
        ]);        
        $alert->save();
        $this->resetUI();
        $this->emit('alert-added-modal','Alerta registrado');

    }
    public function resetUI()
    {
        $this->name = '';
        $this->resetValidation();
       
    }
}
