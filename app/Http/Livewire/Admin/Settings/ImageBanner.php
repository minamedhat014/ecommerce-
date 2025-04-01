<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\BannerImage;
use App\Traits\HasCrud;
use App\Traits\HasImageView;
use App\Traits\HasPhotosUpload;
use Livewire\Component;
use App\Traits\HasTable;
use App\Traits\HasStatus;
use Livewire\Attributes\Computed;

class ImageBanner extends Component
{


    
use HasCrud;
use HasTable;
use HasPhotosUpload;
use HasStatus;
use HasImageView;



public $model = BannerImage::class;
public $name;
public $speed = 2000;
protected $write_permission='write system settings';


    public function closeModal()
    {
   
        $this->reset('name','photos','speed');
    }
    

 

    protected function rules()
    {
            return [
                            'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u|max:255',
                            'speed'=>'numeric|between:700,3000',
                            'photos.*' => 'required|image|mimes:jpeg,png,pdf|max:1024', 

                        ];
    }



 public function store(){
 $validatedData= $this->validate();
 $this->storeRecord($this->model,$validatedData,'banner images');
 }


 public function edit(int $id){
$this->edit_id = $id;
$edit = $this->model::find($id);
$this->name = $edit?->name;
$this->speed = $edit?->speed;
 }

 public function delete(){
    $record =$this->model::FindOrFail($this->edit_id);
   $this->deleteRecord($record);
    }

    
 public function update(){
    $validatedData= $this->validate();
    $record =$this->model::FindOrFail($this->edit_id);
   $this->updateRecord($record,$validatedData,'banner images');
    }

     
   



    #[Computed]
    public function data(){
    return
    $this->model::with('media')->where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sortfilter)->paginate($this->perpage);
    }
    
    public function render()
    {
        return view('livewire.admin.settings.image-banner');
    }
}
