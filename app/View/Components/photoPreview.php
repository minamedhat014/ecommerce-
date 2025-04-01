<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class photoPreview extends Component
{
    /**
     * Create a new component instance.
     */
    public $previews;
    public $removeAction;
    public function __construct($previews , $removeAction)
    {
        $this->previews = $previews;
        $this->removeAction = $removeAction;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.photo-preview');
    }
}
