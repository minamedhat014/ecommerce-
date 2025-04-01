<?php

namespace App\Http\Livewire\Ecommerce\Products;

use App\Models\Price;
use Livewire\Component;
use App\Models\ProductCategory;
use App\Traits\HasCheckbox;
use App\Traits\HasProductFilter;

class Filter extends Component
{
    use HasProductFilter;
    use HasCheckbox;

public $categories=[];


public function mount(){
    $this->categories = ProductCategory::all();
    $prices = Price::pluck('price');
    $this->price_high_range = $prices->max();
    $this->price_low_range =$prices->min();
    $this->price_average_range = $prices->avg();
}

public function filter() {
    $this->dispatch('data-filtered', 
   $this->price_low_range,
   $this->price_high_range,
   $this->checked_ids, 

    );
}

    public function render()
    {
        return view('livewire.ecommerce.products.filter');
    }
}
