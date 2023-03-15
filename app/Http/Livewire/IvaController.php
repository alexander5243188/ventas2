<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Iva;
use Livewire\WithPagination;

class IvaController extends Component
{
    use WithPagination;

    public 
        $tax, 
        $search, 
        $selected_id, 
        $pageTitle, 
        $componentName;
    private $pagination = 5;

    public function mount()
    {
        $this->pageTitle = "Listado";
        $this->componentName = "Impuesto al valor agregado IVA";
    }
    public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

    public function render()
    {
        if(strlen($this->search) > 0)
			$data = Iva::where('tax', 'like', '%' . $this->search . '%')
            ->paginate($this->pagination);
		else
			$data = Iva::orderBy('id','desc')
            ->paginate($this->pagination);

        return view('livewire.iva.iva', [
            'data' =>$data
            ])
        ->extends('layouts.theme.app')
        ->section('content');
    }
    public function Edit($id)
    {
        $record = iva::find($id, ['id', 'tax']);
        $this->selected_id = $record->id;
        $this->tax = $record->tax;
        //dd($record);
        $this->emit('iva-show-modal', 'Iva actualizado');
    }
    public function Update()
    {
        $rules =[
            'tax' => "required|min:2|unique:ivas,tax,{$this->selected_id}"
        ];
        $messages = [
            'tax.required' => 'El valor del iva es requerido',
            'tax.min' => 'El valor del iva por los menos tiene dos dígitos',
            'tax.unique' => 'El valor del iva ya existe',
        ];
        $this->validate($rules, $messages);
        $iva = Iva::find($this->selected_id);
        //dd($iva);
        $iva->update([
            'tax'=>$this->tax,
        ]);
        $iva->save();
        $this->resetUI();
        $this->emit('iva-updated-modal', 'El valor del iva fue actualizado');
    }
    public function resetUI()
    {
        $this->tax = '';
        $this->resetValidation();
        $this->resetValidation();
    }
}
