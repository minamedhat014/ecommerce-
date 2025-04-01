<?php

namespace App\Http\Livewire\Ecommerce\Products;

use App\Traits\HasWishList;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishList extends Component
{

    use HasWishList;

    public $wishlist = [];

    public function mount()
    {
        $this->wishlist = $this->getWishlist();
    }

    public function toggle($productId)
    {
        $this->wishlist = $this->toggleWishlist($productId);
    }


    public function render()
    {
       

        return view('livewire.ecommerce.products.wish-list');
    }
}
