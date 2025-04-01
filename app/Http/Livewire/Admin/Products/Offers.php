<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Offer;
use App\Models\Product;
use App\Traits\HasCrud;

use Livewire\Component;
use App\Models\Discount;
use App\Traits\HasTable;
use App\Models\OffersType;
use App\Traits\HasCheckbox;
use App\Traits\HasMultiSelect;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\productOfferCancelNotification;
use App\Notifications\productOfferLaunchNotification;

class Offers extends Component
{


    use HasTable;
    use HasMultiSelect;
    use HasCheckbox;
    use HasCrud;
    
        public $statusFilter= null ;
        public $model = Offer::class;
        public $name;
        public $start_date;
        public $end_date;
        public $type_id;
        public $requirments;
        public $remarks;
        public $status =1 ;
        public $offer_id;
        public $edit_id;
        public $discount;
        public $offers;
        public $quantity;
        public $discountable_products;
        public $discount_precent;
    
        protected $write_permission="write offer";



    public function mount(){
        if(!authedCan($this->write_permission)){
            $this->statusFilter = 2;
           }
        $this->offers = OffersType::all() ; 
      $this->check_permission('view offers');
          
    }
    
    protected function rules()
       {
            return [ 
            'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
            'start_date' => 'required|date',
            'end_date'=>'required|date',
            'status'=>'numeric',
            'type_id'=>'numeric',
            'requirments'=>'max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
            'remarks'=>'max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
                        ];
    }
    
    


    
    
     public function store(){
        $validatedData = $this->validate();
       $this->storeRecord($this->model,$validatedData);
    }
    

     public function edit(int $id){
     $edit= Offer::findOrFail($id);
     if($edit){
      $this->edit_id = $id;
      $this->name =$edit->name;
      $this->start_date =$edit->start_date;
      $this->end_date =$edit->end_date;
      $this->type_id =$edit->type_id;
      $this->requirments =$edit->requirments;
      $this->status =$edit->status;
      $this->remarks =$edit->remarks;
     }else{
      return redirect()->back();
     }
    
    
     }
    
     public function update(){
       $validatedData = $this->validate();
       $record = $this->model ::findOrFail($this->edit_id);
      $this->updateRecord($record,$validatedData);
     }
    
     
    

    
    
    
    public function AssignProducts(){   
        try{
            $this->check_permission($this->write_permission);
            $validatedData = $this->validate(
                [
                    'checked_ids' =>'required',
                ]);
     $offer = offer::findOrFail($this->edit_id);
     $offer->products()->sync($validatedData[ 'checked_ids']);
     successMessage(); 
     $this->close();
        }catch(\Exception $e){
          errorMessage($e);
    }
    }
    
    
  
    
    public function Launch(){   
     try{
        $this->check_permission($this->write_permission);
      $offer = offer::findOrFail($this->edit_id);
      if($offer->products()->exists()){
       $offer->update([
        'status'=>2,
        'updated_by'=>authName(),
           ]); 
           Notification::send(FactorySalesRecipients(), new productOfferLaunchNotification($offer)); 
           successMessage();    
        }else{
         errorMessage('please assign product and try again');
        }
       }catch(\Exception $e){
        errorMessage($e);
        }
       }
  
  
    
    
    public function suspend(){
        try{
    $this->check_permission($this->write_permission);
     $offer=offer::FindOrFail($this->edit_id);
     $offer->products()->detach();
     Discount::where('offer_id',$this->edit_id)->delete();
     $offer->update([
     'status'=>3,
     'updated_by'=>authName(),
        ]); 
        Notification::send(FactorySalesRecipients(), new productOfferCancelNotification($offer));
        successMessage();  
        }catch(\Exception $e){
          errorMessage($e);
    }
    }
    
    
    

     public function delete(){
     $record =$this->model= offer::FindOrFail($this->edit_id);
     $this->deleteRecord($record);
    }
    
    

public function runDiscount(){
    try {
        $validatedData =$this->validate([
        'discount_precent'=>'required|numeric|between:0.01,0.99'
        ]);
       $offer= offer::findOrFail($this->edit_id);
       if($offer->status ==2){
          DB::beginTransaction();
          Discount::where('offer_id',$this->edit_id)->delete();
          foreach($offer->products()->get() as $product){
              foreach($product->items as $item){
                   $item->price->discounts()->create([
                      'discount_percentage'=>$validatedData['discount_precent'],
                      'offer_id'=>$this->edit_id,
                   ]);
              }  
              }
              DB::commit();  
              successMessage();
       }else{
          errorMessage('your offer is not active .... please activate it firstly');
       }  
     }catch (\Exception $e){
       DB::rollBack();
        errorMessage($e);
     }
 }
 
    
    public function closeModal()
    {
       $this->reset([ 'checked_ids', 'discount_precent','name','start_date','end_date','type_id','requirments','remarks']);
    }
    
    #[Computed]
    public function data(){
        return 
        offer::with('typeOffer','products','discount')
        ->when($this->statusFilter, function($query) {
         $query->where('status', $this->statusFilter);
     })->where('name', 'like', '%'.$this->search.'%')->orderBy('id',$this->sortfilter)->paginate($this->perpage);
  
    }
    
    public function render()
    {
        $this->discountable_products = Product::with('items','type')->where('status',2)
        ->where('name', 'like', '%'.$this->check_search.'%')
        ->get();
        return view('livewire.admin.products.offers');
    }
}
