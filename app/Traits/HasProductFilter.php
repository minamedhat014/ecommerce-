<?php


namespace App\Traits;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

trait HasProductFilter {

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $isFiltered = false;
    public $price_low_range;
    public $price_high_range;
    public $price_average_range;
    public $category_id;
    public $page = 100;
    public $products =[];
    public $categories=[];



}
