<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Traits\HasTable;
use App\Models\Availableitem;
use App\Models\productDetail;
use App\Traits\HasfileUpload;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\availableItemsExport;
use App\Imports\AvailableItemdImport;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AvailableItemsNotification;
use App\Traits\HasCrud;

class AvailableItems extends Component
{

    use HasTable;
    use HasCrud;
    use HasFileUpload;
    public $balance;
    public $item_id;
    public $consumption_rate_per_week;
    public $available_date;
  

 
    public function mount(){
    $this->check_permission('view available items');
      }

    protected function rules()
    {
            return [ 
                'balance' =>'required|min:3|numeric',
                'consumption_rate_per_week' => 'required|min:3|numeric',
                'available_date'=>'nullable|date',
                        ];
    }
    
    
    public function gettingItemId($id)
        {
            $this->item_id = $id;
        }
    
     
    public function updateList(){
        try{
            $this->check_permission('upload available');
            $validatedData = $this->validate([
                'file' => 'required|mimes:xls,xlsx|max:2048', // Validating Excel files
            ]);
            Availableitem::truncate();
            Excel::import(new AvailableItemdImport,$validatedData['file']);
            successMessage();
            $this->close();
        }catch(\Exception $e){
         
            errorMessage($e);
        }
    
     }

     public function closeModal(){
     $this->reset([
      'file','balance','consumption_rate_per_week','available_date'
     ]);
     }
    
     public function edit($id){
        $this->item_id = $id;
        $item= productDetail::findOrFail($id);
        $item_code = $item->item_code; 
        $edit= Availableitem::where('item_code',$item_code)->first();
        if($edit){
        $this->balance = $edit->balance;
        $this->consumption_rate_per_week = $edit->consumption_rate_per_week;
        $this->available_date = $edit->available_date;
        }else{
         return redirect()->back();
     }
    }
    
    
  

 public function update(){
    try{
        DB::beginTransaction();
        $validatedData= $this->validate();
        $item= ProductDetail::findOrFail($this->item_id);
        $item_code = $item->item_code;    
    $available=  Availableitem::where('item_code',$item_code)->first();
     $available->update([
    'balance'=>$validatedData['balance'],
      'consumption_rate_per_week'=>$validatedData['consumption_rate_per_week'],
      'available_date'=>$validatedData['available_date'],
     'updated_by'=>authName(),
     ]); 
     DB::commit();
     successMessage();
     Notification::send(FactorySalesRecipients(), new AvailableItemsNotification($available));
    }catch(\Exception $e){
        DB::rollBack();
      errorMessage($e);
    }  
    }




       public function delete($id){
        try {
            $item= ProductDetail::findOrFail($id);
            $item_code = $item->item_code;      
           Availableitem::where('item_code',$item_code)->delete();
          successMessage();
         }catch (\Exception $e){
             DB::rollBack();
           errorMessage($e);
         }
     }

    
     

    
public function export() 
{
    try{   
        $this->check_permission('download available');  
        return Excel::download(new availableItemsExport(), 'avilable items.xlsx');
    successMessage();
    }catch (\Exception $e){
        errorMessage($e);
    }
}


#[Computed]
public function data(){

    return 
    productDetail::with('product','price','balance')
    ->WhereHas('product', function ($query) {
       $query->where('name', 'like', '%' . $this->search . '%');})
       ->whereHas('balance', function ($query) {
           $query->where('balance', '>', 0); 
       })
        ->orderBy('id',$this->sortfilter)->paginate($this->perpage);

}
 
    public function render()
    {
        return view('livewire.admin.products.available-items');
    }
}
