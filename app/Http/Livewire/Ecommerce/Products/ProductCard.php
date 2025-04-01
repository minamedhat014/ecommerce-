<?php

namespace App\Http\Livewire\Ecommerce\Products;

use App\Traits\HasCart;
use Livewire\Component;


class ProductCard extends Component
{
    public $product;



    public function addToCart(int $id)
    {
    
            $this->dispatch('added-to-cart',$id);
    }

    public function viewProduct(int $id)
    {
    
            $this->dispatch('view-product-modal',$id);
    }

    public function render()
    {
    
        return view('livewire.ecommerce.products.product-card');
    }
}
