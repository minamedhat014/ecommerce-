<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Traits\HasCrud;
use Livewire\Component;
use App\Traits\HasTable;
use App\Traits\HasStatus;
use Livewire\Attributes\Computed;
use App\Models\PageLink as ModelsPageLink;
use App\Models\PageType;

class PageLink extends Component
{

    
use HasCrud;
use HasTable;
use HasStatus;



public $model = ModelsPageLink::class;

public $types =[];
public $pages = [];
public $type_id;
public $parent_id;
public $title_en;
public $title_ar;
protected $write_permission='write system settings';


    public function closeModal()
    {
   
        $this->reset('type_id','title_en','title_ar','parent_id');
    }
    

 

    protected function rules()
    {
            return [
                            'type_id' => 'required|numeric',
                            'parent_id' => 'nullable|numeric',
                            'title_en' => 'required|regex:/^[a-zA-Z\s]+$/', 
                            'title_ar'=>'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
                        ];
    }

    public function mount(){
        $this->types = PageType::all();
    }


 public function store(){
 $validatedData= $this->validate();
 $this->storeRecord($this->model,$validatedData);
 }


 public function edit(int $id){
$this->edit_id = $id;
$edit = $this->model::find($id);
$this->type_id  = $edit->type_id ;
$this->title_en = $edit->title_ar;
$this->title_ar = $edit->title_ar;

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
    $this->model::with('type','parent','children')
    ->when($this->search, function ($query) {
        $query->where(function ($q)  {
            $q->where('title_en', 'like', '%' . $this->search . '%')
              ->orWhere('title_ar', 'like', '%' . $this->search . '%');
        });
    })
    ->orderBy('id', $this->sortfilter)->paginate($this->perpage);
    }
    
    public function render()
    {
        $this->pages = $this->model::where('status','active')->get();
        return view('livewire.admin.settings.page-link');
    }
}
