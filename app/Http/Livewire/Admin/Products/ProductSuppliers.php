<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Supplier;
use App\Traits\HasCrud;
use Livewire\Component;
use App\Traits\HasTable;
use App\Traits\HasStatus;
use Livewire\Attributes\Computed;

class ProductSuppliers extends Component
{

       
use HasCrud;
use HasTable;
use HasStatus;



public $model = Supplier::class;

public $name;
public $email;
public $phone;
public $address;
public $bank_account;

protected $write_permission='write supplier';


    public function closeModal()
    {
   
        $this->reset('name','email','phone','address','bank_account');
    }
    

 

    protected function rules()
    {
            return [
                            'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
                            'email' => 'nullable|email',
                            'phone' => 'nullable|numeric', 
                            'address'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
                            'bank_account'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
                        ];
    }

 

 public function store(){
 $validatedData= $this->validate();
 $this->storeRecord($this->model,$validatedData);
 }


 public function edit(int $id){
$this->edit_id = $id;
$edit = $this->model::find($id);
$this->name  = $edit->name ;
$this->email = $edit->email;
$this->phone = $edit->phone;
$this->bank_account = $edit->bank_account;
$this->address = $edit->address;

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
        return view('livewire.admin.products.product-suppliers');
    }
}
