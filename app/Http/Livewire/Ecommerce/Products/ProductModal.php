<?php

namespace App\Http\Livewire\Ecommerce\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductModal extends Component
{

    public $product;
    public $isReady = false;

    public function addToCart(int $id)
    {
            $this->dispatch('added-to-cart',$id);
    }

   


    #[On('view-product-modal')] 
    public function view($id){
    $this->product =Product::findOrFail($id);
    $this->isReady = true; 
    }
    
    
    #[On('modal-closed')] 
    public function resetProduct(){
     $this->product = null;
     $this->isReady = false; 
    }


    public function render()
    {
        return view('livewire.ecommerce.products.product-modal');
    }
}
