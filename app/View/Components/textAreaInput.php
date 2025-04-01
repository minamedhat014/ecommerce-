<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textAreaInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $label;
    public $placeholder;
    public $rows;
    public $value;
    public $helpText;
    public $class;

    public function __construct(
        $name, 
        $label = null, 
        $placeholder = null, 
        $rows = 3, 
        $value = null, 
        $helpText = null, 
        $class = null
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->rows = $rows;
        $this->value = $value;
        $this->helpText = $helpText;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-area-input');
    }
}
