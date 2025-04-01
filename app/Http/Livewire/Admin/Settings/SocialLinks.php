<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\SocialMediaLinks;
use App\Traits\HasCrud;
use App\Traits\HasStatus;
use Livewire\Component;
use App\Traits\HasTable;
use Livewire\Attributes\Computed;

class SocialLinks extends Component
{

    
use HasCrud;
use HasTable;
use HasStatus;



public $model = SocialMediaLinks::class;
public $name;
public $link;
public $icon;
protected $write_permission='write system settings';


    public function closeModal()
    {
   
        $this->reset('name','link','icon');
    }
    

 

    protected function rules()
    {
            return [
                            'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
                            'link' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-\/\.\#\:]+$/u',
                            'icon' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-\#\.]+$/u', 
                        ];
    }



 public function store(){
 $validatedData= $this->validate();
 $this->storeRecord($this->model,$validatedData);
 }


 public function edit(int $id){
$this->edit_id = $id;
$edit = $this->model::find($id);
$this->name = $edit->name;
$this->link = $edit->link;
$this->icon = $edit->icon;

 }

 public function delete(){
    $record =$this->model::FindOrFail($this->edit_id);
   $this->deleteRecord($record);
    }

    
 public function update(){
    $validatedData= $this->validate();
    $record =$this->model::FindOrFail($this->edit_id);
   $this->updateRecord($record,$validatedData);
    }




    #[Computed]
    public function data(){
    return
    $this->model::where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sortfilter)->paginate($this->perpage);
    }
    
    public function render()
    {
        return view('livewire.admin.settings.social-links');
    }
}
