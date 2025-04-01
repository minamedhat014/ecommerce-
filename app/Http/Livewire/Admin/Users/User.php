<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Admin;
use App\Models\Company;
use Livewire\Component;
use App\Traits\HasTable;
use App\services\UserService;
use App\Traits\HasCrud;
use App\Traits\HasMultiSelect;
use App\Traits\HasPhotoUpload;
use Livewire\Attributes\Computed;
use Spatie\Permission\Models\Role;

class User extends Component
{

    use HasTable;
    use HasPhotoUpload;
    use HasMultiSelect;
    use HasCrud;
    public $model = Admin::class;

    public $name;
    public $email;
    public $password;
    public $phone = null;
    public $assigned_roles =[];
    public $roles;
 

    protected $write_permission='write user';


     
    public function mount(){
        $this->check_permission('view user');
        $this->roles = Role ::all('id','name');

    }

    public function closeModal()
    {
   
        $this->reset('name','email','phone','password','assigned_roles','photo',);
    }
    

 

    protected function rules()
    {
            return [
                            'name' => 'required|string|max:255',
                            'email' => 'required|min:6|max:255|email|unique:admins,email,' . $this->edit_id,
                            'password' => 'required|min:7',
                            'phone' => 'nullable|regex:/^01[0-9]{9}$/',
                            'photo' => 'nullable|image|mimes:jpeg,png,pdf|max:1024', // 1MB Max

                        ];
    }




    public function store(){
        $validatedData = $this->validate();
        $this->storeRecord($this->model, $validatedData, 'profile');
    }
    

 public function edit(int $id){
 $edit= Admin::findOrFail($id);

 if($edit){
  $this->edit_id= $id;
  $this->name =$edit->name;
  $this->email =$edit->email;
  $this->phone =$edit->phone;
 }else{
  return redirect()->back();
 }


 }




 public function update(){
    $validatedData = $this->validate();
    $record =$this->model::FindOrFail($this->edit_id);
    $this->updateRecord($record, $validatedData, 'profile');
}




 
  public function assignRoles (){ 
   try{
    $this->check_permission($this->write_permission);
   $admin= Admin::findOrFail($this->edit_id);
   $admin ->syncRoles($this->assigned_roles);
    successMessage();
    $this->close();
   }catch(\Exception $e){
    errorMessage($e);
    }

  }

   public function changeStatus (int $id){
    $this->check_permission($this->write_permission);
    $admin = Admin::findOrFail($id); 
    if($admin->status ==1 && $id > 1 ){
    $admin->update([
        'status' => 0
    ]);
    errorMessage('user now is deactive '); 
    }elseif($admin->status == 0){
    $admin->update([
        'status' => 1
    ]);
    errorMessage('user now is active '); 
    }
   }


  public function removeRoles (){
    try{
        $this->check_permission($this->write_permission);
        if($this->edit_id> 1 ){
        $admin= Admin::findOrFail($this->edit_id);
        $admin ->syncRoles([]);
       successMessage();
       $this->close();
    }
        else{
            errorMessage('The roles of this admin are not allawed to be removed '); 
        }
        }catch(\Exception $e){
            errorMessage($e);
         }
  }
 

  
 public function delete(){
   try {
    $this->check_permission($this->write_permission);
    if($this->edit_id> 1 ){
     Admin::FindOrFail($this->admin_id)->delete();
     successMessage();
     $this->close();
  
    }
    errorMessage('You are not allawed to remove this Admin '); 
    }catch(\Exception $e){
        errorMessage($e);
    }
}

#[Computed]
public function admins(){
    return Admin::where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sortfilter)->paginate($this->perpage);
}


public function render()
{
        return view('livewire.Admin.users.user');
    
    }
}
