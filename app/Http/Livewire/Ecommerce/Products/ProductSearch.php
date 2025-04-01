<?php

namespace App\Http\Livewire\Ecommerce\Products;

use App\Models\Product;
use Livewire\Component;


class ProductSearch extends Component
{
  
    public $search ='';
    protected $queryString = ['search'];
    public $products =[];

    protected function rules()
    {
         return [ 
       'search'=> 'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u'
       
         ];               
    }
    public function clearSearch()
    {
        $this->search = ''; // Clear the search field
    }
  
    public function updated($feilds)
    {
        $this->validateOnly($feilds);
    }


    public function render()
    {

    if (trim($this->search) === '') {
        $this->products = [];
    } else {
        $this->products = Product::with(['category', 'media', 'offers', 'price'])
            ->where('status', 'active')
            ->where(function ($query) {
                $query->where('name_en', 'like', '%' . $this->search . '%')
                      ->orWhere('name_ar', 'like', '%' . $this->search . '%');
            })
            ->take(10)
            ->get();
    }
            
        return view('livewire.ecommerce.products.product-search');
    }
}
