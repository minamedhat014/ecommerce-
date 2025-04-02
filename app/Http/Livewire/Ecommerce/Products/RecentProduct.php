<?php

namespace App\Http\Livewire\Ecommerce\Products;

use App\Models\Product;
use App\Traits\HasCart;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Traits\HasProductFilter;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Session;

class RecentProduct extends Component
{

use HasProductFilter;

public $products =[];
public $columns;


#[On('data-filtered')] 
    public function updatePostList($low,$high,$checked_ids)
    {
       
    }


    public function setColumns($columns)
    {
        $this->columns = $columns;
        Session::put('product_columns', $columns);
    }


public function mount(){
    $this->columns = Session::get('product_columns', 3);
    $this->products = Product::all();
}

    public function render()
    {

        return view('livewire.ecommerce.products.recent-product');
    }
}
