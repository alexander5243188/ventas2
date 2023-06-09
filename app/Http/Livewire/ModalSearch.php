<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;

class ModalSearch extends Component
{
    public $search, $products =[];
    protected $paginationTheme = 'bootstrap';

    public function liveSearch()
    {
        if (strlen($this->search) > 0) {
            $this->products = Product::join('categories as c', 'c.id', 'products.category_id')
                ->join('brands as b', 'b.id', 'products.brand_id')
                ->select(
                    'products.*', 
                    'c.name as category',                    
                    'b.name as graciela'
                    )
                ->where('products.name', 'like', "%{$this->search}%")
                ->orWhere('products.barcode', 'like', "%{$this->search}%")
                ->orWhere('c.name', 'like', "%{$this->search}%")
                ->orderBy('products.name', 'asc')
                ->get()->take(6);
        } else {
            return $this->products = [];
        }
    }
    public function render()
    {
        $this->liveSearch();
        return view('livewire.modalsearch.component');
    }
    public function addAll()
    {
        if (count($this->products) > 0) {
            foreach ($this->products as $product) {
                $this->emit('scan-code-byid', $product->id);
            }
        }
    }
}
