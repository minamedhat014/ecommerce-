<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Bank;

use Livewire\Component;
use App\Traits\HasTable;
use App\Models\Installment;
use App\Traits\HasCrud;
use Livewire\Attributes\Computed;


class Installments extends Component
{
    use HasTable;
    use HasCrud;


   public $model = Installment::class;
    public $statusFilter= null ;
    public $name;
    public $ends_at;
    public $status=1;
    public $remarks;
    public $start_from;
    public $edit_id;
    public $delete_id;
    public $banks;
    public $bank_name;
    public $max_months_installments =60;
    public $months_without_intrest =12 ;
    public $percentage_of_admin_fees;
    public $factory_intrest;
    public $branch_intrest;
    protected $write_permission ="write installment";
  




protected function rules()
   {
        return [ 
        'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'start_from' => 'required|date',
        'ends_at'=>'required|date',
        'bank_name' => 'required|required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u|max:500',
        'max_months_installments' => 'required|numeric',
        'months_without_intrest' => 'required|numeric',
        'percentage_of_admin_fees'=>'required|numeric|between:0,30',
        'factory_intrest'=>'required|numeric|between:0,30',
        'branch_intrest'=>'required|numeric|between:0,30',
        'status'=>'numeric',
        'remarks'=>'max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
                    ];
}

public function mount()
{
 $this->banks= Bank::all();
}



public function store(){
        $validatedData = $this->validate();
     $this->storeRecord($this->model,$validatedData);
}

 public function edit(int $id){
 $edit= Installment::findOrFail($id);
 if($edit){
  $this->edit_id = $id;
  $this->name =$edit->name;
  $this->start_from =$edit->start_from;
  $this->ends_at =$edit->ends_at;
  $this->bank_name =$edit->bank_name;
  $this->max_months_installments =$edit->max_months_installments;
  $this->months_without_intrest =$edit->months_without_intrest;
  $this->status =$edit->status;
  $this->percentage_of_admin_fees =$edit->percentage_of_admin_fees;
  $this->factory_intrest =$edit->factory_intrest;
  $this->branch_intrest =$edit->branch_intrest;
  $this->remarks =$edit->remarks;
 }else{
  return redirect()->back();
 }


 }


 public function update(){
    $validatedData = $this->validate();
    $record = $this->model::findOrFail($this->edit_id);
 $this->updateRecord($record,$validatedData);
}

 
public function launch(int $id){
    try{
$this->check_permission($this->write_permission);
 $inst=Installment::where('id',$id)->update([
 'status'=>2,
 'updated_by'=>authName(),
    ]); 
 successMessage();  

    }catch(\Exception $e){
        errorMessage($e);
}
}


public function suspend(int $id){
    try{
$this->check_permission($this->write_permission);
 Installment::where('id',$id)->update([
 'status'=>3,
 'updated_by'=>authName(),
    ]); 
 successMessage();   

    }catch(\Exception $e){
        errorMessage($e);
}
}

 

    
 public function delete(){
    $record =$this->model::FindOrFail($this->edit_id);
    $this->deleteRecord($record);
  }

    
public function closeModal()
{
    $this->reset(['name','start_from','ends_at',
    'remarks','bank_name','max_months_installments','months_without_intrest',
     'percentage_of_admin_fees','factory_intrest','branch_intrest'
]); 
}


#[Computed]
public function data(){
    return Installment::when($this->statusFilter,function($query){
        $query->where('status',$this->statusFilter);
    })
    ->where('name', 'like', '%'.$this->search.'%')->orderBy('id',$this->sortfilter)->paginate($this->perpage);
}

    public function render()
    {
        
        return view('livewire.admin.products.installments');
    }
}
