<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;

class DynamicInput extends Component
{

    public $inputs = []; 
    public $name_ar;
    public $name_en;


    public function mount()
    {
        $this->addInput();
    }

    public function addInput()
    {
        $this->inputs[] = [
            $this->name_ar => '',
            $this->name_en => '',
        ];  
        
    }

    public function removeInput($index)
    {
        unset($this->inputs[$index]); 
        $this->inputs = array_values($this->inputs); 
    }

    public function updated()
    {
        $validatedData =   $this->validate();
        $this->dispatch('dynamic-incerted',$validatedData);
    }

    protected function rules()
    {
        return [ 
            "inputs.*.{$this->name_ar}" => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-\&\/\.]+$/u',
            "inputs.*.{$this->name_en}" => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-\&\/\.]+$/u'
        ];                 
    }


    public function render()
    {
        return view('livewire.admin.settings.dynamic-input');
    }
}
