<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReadMore extends Component
{
   
   public $text;
    public $limit;

    public function __construct($text, $limit = 50)
    {
        $this->text = $text;
        $this->limit = $limit;
    }

    public function render(): View|Closure|string
    {
        return view('components.read-more');
    }
}
