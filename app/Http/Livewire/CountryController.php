<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Country;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CountryController extends Component
{
    use WithFileUploads;
    use WithPagination;

    public 
        $name, 
        $image, 
        $search, 
        $selected_id, 
        $pageTitle, 
        $componentName,
        $componentNames;

    private $pagination = 5;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'un país';
        $this->componentNames = 'País';
    }
    public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}
    public function render()
    {
        if(strlen($this->search) > 0)
            $data = Country::where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->pagination);
        else
            $data = Country::orderBy('name','asc')
            ->paginate($this->pagination);

        return view('livewire.country.country', [
            'data' =>$data
            ])
        ->extends('layouts.theme.app')
        ->section('content');
    }
    public function Edit($id)
	{
		$record = Country::find($id, ['id','name','image']);
        $this->selected_id = $record->id;
		$this->name = $record->name;		
		//$this->imagen = $record->image;
        //dd($record);

        
		$this->emit('country-show-modal', 'País creado');
        
	}
    public function Update()
    {
		$rules =[
			'name' => "required|min:2|unique:countries,name,{$this->selected_id}"
		];

		$messages =[
			'name.required' => 'Nombre del país requerido',
			'name.min' => 'El nombre del país debe tener al menos 2 caracteres',
			'name.unique' => 'El nombre del país ya existe'
		];

		$this->validate($rules, $messages);


		$country = Country::find($this->selected_id);
		$country->update([
			'name' => $this->name
		]);

		if($this->image)
		{
			$customFileName = uniqid() . '_.' . $this->image->extension();
			$this->image->storeAs('public/countries', $customFileName);
			$imageName = $country->image;

			$country->image = $customFileName;
			$country->save();

			if($imageName !=null)
			{
				if(file_exists('storage/countries' . $imageName))
				{
					unlink('storage/countries' . $imageName);
				}
			}

		}

		$this->resetUI();
		$this->emit('country-updated-modal', 'Categoría Actualizada');
	}
    public function Store()
    {
        $rules = [
            'name' => 'required|unique:countries|min:2'
        ];

        $messages = [
            'name.required' => 'Nombre del país es requerido',
            'name.unique' => 'Ya existe el nombre del país',
            'name.min' => 'El nombre del país debe tener al menos 2 caracteres'
        ];

        $this->validate($rules, $messages);

        $country = Country::create([
            'name' => $this->name
        ]);

        $customFileName;
        if($this->image)
        {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/countries', $customFileName);
            $country->image = $customFileName;
            $country->save();
        }

        $this->resetUI();
        $this->emit('country-added-modal','País Registrado');

    }
    
    protected $listeners = [
        'deleteRow' => 'Destroy'
    ];
       
    public function Destroy(Country $country )
	{
        //$country = Country::find($id);
        //dd($country);
		$imageName = $country->image;
		$country->delete();

		if($imageName !=null) {
			unlink('storage/countries/' . $imageName);
		}

		$this->resetUI();
		$this->emit('country-deleted-modal', 'País Eliminado');

	}
    public function resetUI()
    {
        $this->name = '';
        //$this->image = null;
        $this->resetValidation();
        //$this->resetValidation();
    }
}
