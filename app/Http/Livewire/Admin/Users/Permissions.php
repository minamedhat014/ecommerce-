<?php

namespace App\Http\Livewire\Admin\Users;

use App\Traits\HasCrud;
use Livewire\Component;
use App\Traits\HasTable;
use Livewire\Attributes\Computed;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
 

    use HasTable;
    Use HasCrud;

    public $model = Permission::class;
    public $name;
    public $guard_name ='admin';
    protected $write_permission = 'write user';

    protected function rules()
    {
         return
         
         [ 'name' => 'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u|unique:permissions,name,'.$this ->edit_id,
          
                     ];
 
                    
 }




public function closeModal()
    {
        $this->reset();
    }

    public function mount(){
        $this->check_permission('view users');
    }


    
 public function store(){
    try{
        $this->check_permission($this->write_permission);
        $validatedData = $this->validate();
        Permission::create([
        'name' =>$validatedData['name'],
        'guard_name' =>$this->guard_name,
        ]);
        successMessage();
        $this->close();
     }catch (\Exception $e){
        errorMessage($e);
    }
 }

 public function edit(int $id){
 $edit= Permission::findOrFail($id);

 if($edit){
  $this->edit_id= $id;
  $this->name =$edit->name;

 }else{
  return redirect()->back();
 }


 }


 public function update(){
        try{
        $this->check_permission($this->write_permission);
     $validatedData = $this->validate();
     Permission::where('id',$this->permission_id)->update([
     'name'=>$validatedData['name']
     ]);
     successMessage();
     $this->close();
    }catch (\Exception $e){
        errorMessage($e);
    }
}



 
 public function delete(){
    {
        $this->check_permission($this->write_permission);
        Permission::FindOrFail($this->edit_id_id)->delete();
        successMessage();  
    }
}



#[Computed]
public function permissions(){
return
Permission::where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sortfilter)->paginate($this->perpage);
}

public function render()
{
      
        return view('livewire.Admin.users.permissions');
    }
}
