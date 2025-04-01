<?php

namespace App\Http\Livewire\Ecommerce\Products;


use App\Traits\HasCart;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Cart extends Component
{
   
    use HasCart;

    public function mount()
    {
        $this->mountCart();
    }
    
    #[On('added-to-cart')] 
    public function add($id){
     $this->addToCart($id);
     successMessage();
    }

    public function emptyCart()
{
 
    $this->cart = []; // Clear the cart array
    $this->total = 0; // Reset the total
    session()->forget('cart'); // Remove from session
    $this->dispatch('cartEmptied'); // Optional: Emit event for UI updates
    successMessage();
}

public function increaseQuantity($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']++;
        }
        session()->put('cart', $this->cart);
        $this->calculateTotal();
    }

    public function decreaseQuantity($productId)
    {
        if (isset($this->cart[$productId]) && $this->cart[$productId]['quantity'] > 1) {
            $this->cart[$productId]['quantity']--;
        }
        session()->put('cart', $this->cart);
        $this->calculateTotal();
    }

    public function removeItem($productId)
    {
        unset($this->cart[$productId]);
        session()->put('cart', $this->cart);
        $this->calculateTotal();
    }


#[Computed]
    public function data()
    {
        return $this->cart;
    }

    public function render()
    {
        return view('livewire.ecommerce.products.cart');
    }
}
