<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormRangeInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $bname;
    public $fname;
    public $min;
    public $max;
    public $avr;
    /**
     * Create a new component instance.
     */
    
    public function __construct($bname,$fname,$min,$max,$avr)
    {
        $this->bname=$bname;
        $this->fname=$fname;
        $this->min=$min;
        $this->max=$max;
        $this->avr=$avr;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-range-input');
    }
}
