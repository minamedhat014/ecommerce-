<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formPhoto extends Component
{
    public $bname = null;
    public $fname;
    public $uploadedPreview = null;

    /**
     * Create a new component instance.
     */
    
    public function __construct($bname,$fname,$uploadedPreview = null)
    {
        $this->bname=$bname;
        $this->fname=$fname;
        $this->uploadedPreview=$uploadedPreview;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-photo');
    }
}
