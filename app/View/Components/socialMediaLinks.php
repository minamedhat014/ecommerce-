<?php

namespace App\View\Components;

use App\Models\SocialMediaLinks as ModelsSocialMediaLinks;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class socialMediaLinks extends Component
{
    /**
     * Create a new component instance.
     */
    public $data = [];
    public function __construct()
    {
     $this->data = ModelsSocialMediaLinks::where('status','active')->get();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.social-media-links',[
            'data' => $this->data]);
    }
}
