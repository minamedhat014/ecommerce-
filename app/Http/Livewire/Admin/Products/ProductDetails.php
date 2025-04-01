<?php

namespace App\Http\Livewire\Admin\Products;


use Livewire\Component;

use App\Traits\HasTable;
use App\Models\ProductDetail;
use App\Traits\HasPhotoUpload;
use Livewire\Attributes\Locked;
use App\Models\ProductComponent;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use App\Traits\HasCrud;

class ProductDetails extends Component
{

use HasTable;
Use HasPhotoUpload;
use HasCrud;

#[Locked]
public $product_id;
public $model= ProductDetail::class;
public $type_id;
public $item_code;
public $descripation;
public $item_color;
public $item_material;
public $item_hieght;
public $item_width;
public $item_out_depth;
public $item_inner_depth;
public $component_name;
public $remarks;
public $quantity =1;
public $product_detail_id;
public $name;
public $status;
public $selected =[];
public $photo;
public $original_price;
public $final_price;
public $offers;
public $componentNames;
protected $write_permission="write product";


protected function rules()
{
        return [ 
            'product_id' => 'required',
            'item_code' =>'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u|unique:product_details,item_code,'.$this-> product_detail_id,
            'descripation' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
            'component_name' => 'required',
            'quantity'=>'required|int|max:6',
            'item_color' => 'required',
            'item_hieght'=>'required|numeric|max:350',
            'item_width'=>'required|numeric|max:400',
            'item_out_depth'=>'required|numeric|max:250',
            'item_inner_depth'=>'required|numeric|max:250',
            'remarks'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
            'original_price' => 'required|numeric|between:0,100000.99',
            'final_price' => 'required|numeric|between:0,100000.99',
            'photo' => 'nullable|image|mimes:jpeg,png,pdf|max:1024', // 1MB Max
                    ];
}

 
public function mount(){
    $this->componentNames=ProductComponent::where('type_id',$this->type_id)->get();
}



public function closeModal()
    {
        $this->reset(
        'item_code','descripation','component_name','item_color','quantity',
        'item_hieght','item_width','item_out_depth','item_inner_depth','remarks'
        ,'photo','status','original_price','final_price',
    );
    }

     

public function store(){
  $validatedData = $this->validate();
  $relations =[
    'price' =>[
        'original_price'=>$validatedData['original_price'],
        'final_price'=>$validatedData['final_price'],
        'created_by'=>authName(),
    ]
    ];
    $this->storeRecord($this->model,$validatedData,null,$relations);
 }


 public function edit($id){
    $edit= ProductDetail::with('price')->where('id',$id)->first();

    if($edit){
     $this->edit_id= $id;
     $this->item_code =$edit->item_code;
     $this->descripation=$edit->descripation;
     $this->component_name =$edit->component_name;
     $this->quantity =$edit->quantity;
     $this->item_color =$edit->item_color;
     $this->item_hieght =$edit->item_hieght;
     $this->item_width =$edit->item_width;
     $this->item_out_depth =$edit->item_out_depth;
     $this->item_inner_depth =$edit->item_inner_depth;
     $this->remarks =$edit->remarks;
     $this->original_price= $edit->price->original_price;
     $this->final_price =$edit->price->final_price;
    }else{
     return redirect()->back();
 }
}


public function update(){
    $validatedData = $this->validate();
    $record=$this->model::FindOrFail($this->edit_id);
    $relations =[
      'price' =>[
          'original_price'=>$validatedData['original_price'],
          'final_price'=>$validatedData['final_price'],
          'updated_by'=>authName(),
      ]
      ];
      $this->updateRecord($record,$validatedData,null,$relations);
   }
  
     public function delete(){
   $record = $this->model::FindOrFail($this->edit_id);
   $this->deleteRecord($record);
     }

 

  
     public function removeSet(int $id){
        try{
            ProductDetail::FindOrFail($id)->update([
                'set'=>0,
            ]);
            successMessage();
           }catch(\Exception $e){
              errorMessage($e);
           }
            }
        
    
         public function AddToSet(int $id){
        try{
            ProductDetail::FindOrFail($id)->update([
                'set'=>1,
            ]);
           successMessage();
           }catch(\Exception $e){
              errorMessage($e);
           }
                }
            
    
        
 
    #[Computed]
    public function data(){
        return productDetail::with('product','price')->where('product_id',$this->product_id)->get();
    }
  
    public function render()
    {
     
        $id=$this->product_id;
        $this->selected= ProductDetail::where('product_id',$this->product_id)->where('set',1)->get();
        return view('livewire.Admin.products.product-details',compact('id'));
    }
}
