<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;

class DepartmentController extends Component
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
        $this->pageTitle = 'Listado';
        $this->componentName = 'Departamentos';
    }
    public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

    public function render()
    {
        if(strlen($this->search) > 0)
            $data = Department::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $data = Department::orderBy('id','desc')->paginate($this->pagination);

        return view('livewire.department.department',[
            'data' => $data
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }    
}
