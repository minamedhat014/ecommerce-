<?php

namespace App\Http\Livewire\Ecommerce\Products;

use Livewire\Component;

class ShowProduct extends Component
{
    public $product;



    
    public function render()
    {
        return view('livewire.ecommerce.products.show-product');
    }
}
