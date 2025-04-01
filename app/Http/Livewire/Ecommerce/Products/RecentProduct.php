<?php

namespace App\Http\Livewire\Ecommerce\Products;

use App\Models\Product;
use App\Traits\HasCart;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Traits\HasProductFilter;
use Livewire\Attributes\Computed;

class RecentProduct extends Component
{

use HasProductFilter;

public $products =[];

#[On('data-filtered')] 
    public function updatePostList($low,$high,$checked_ids)
    {
       
    }


  

public function mount(){
    $this->products = Product::all();
}

    public function render()
    {

        return view('livewire.ecommerce.products.recent-product');
    }
}
