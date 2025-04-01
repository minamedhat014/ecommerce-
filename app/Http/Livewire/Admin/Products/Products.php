<?php

namespace App\Http\Livewire\Admin\Products;


use App\Models\Product;
use App\Traits\HasCrud;
use Livewire\Component;
use App\Traits\HasTable;
use App\Traits\HasMultiSelect;
use App\Traits\HasPhotosUpload;
use Livewire\Attributes\Computed;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductDetailsExport;
use App\Models\ProductAplication;
use App\Models\ProductCategory;
use App\Models\ProductFeature;
use App\Models\supplier;
use App\Traits\HasStatus;

class Products extends Component
{
    use HasMultiSelect;
    use HasPhotosUpload;
    use HasTable;
    use HasCrud;
    use HasStatus;
    
  



    public $startDate ;
    public $endDate;  
    public $model= Product::class;
    public $product_id;
    public $categories =[];
    public $features=[];
    public $applications=[];
    public $name_ar; 
    public $name_en;
    public $slug;
    public $sku;        
    public $category_id; 

    public $description_en;
    public $description_ar;
    public $status; 
    public $price;     
    public $remarks;     
    protected $write_permission ='write product';


       public function closeModal()
       {
        $this->reset([
           'name_ar','name_en','description_en','description_ar','category_id','remarks',
          'price','sku'
     ]);
       
       }
   

   public function mount(){
    $this->check_permission('view products');
    $this->categories = ProductCategory::all();
   }


   protected function rules()
   {
       return [ 
        'name_en' => 'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u',
           'name_ar' => [
               'required',
               'regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
           ],
           'sku'=> [
               'required',
               'regex:/^[\p{Arabic}a-zA-Z0-9\s\-\/]+$/u',
               'unique:products,sku,' . $this->edit_id,
           ],
           'category_id' => 'required',
           'price' => 'required|numeric|between:0,100000.99',
           'description_en' => 'required|max:1000|regex:/^[\p{Arabic}a-zA-Z0-9\s\-\.\,\(\)]+$/u',
           'description_ar' => 'required|max:1000|regex:/^[\p{Arabic}a-zA-Z0-9\s\-\.\,\(\)]+$/u',
           'remarks' => 'nullable|max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
           'photos.*' => 'required|image|mimes:jpeg,png|max:1024', // 1MB Max
       ];
   }
   


 public function store(){
    $this->sku = $this->category_id .'/'.$this->name_en;
   $validatedData = $this->validate();
   $relations =[
    'price' =>[
        'price'=>$validatedData['price'],
        'created_by'=>authName(),
    ]
    ];
   $this->storeRecord($this->model,$validatedData,'products',$relations);
}



 public function edit(int $id){
 $edit= Product::findOrFail($id);
 if($edit){
  $this-> edit_id= $id;
  $this->name_ar =$edit->name_ar;
  $this->name_en =$edit->name_en;
  $this->slug =$edit->slug;
  $this->category_id =$edit->category_id;
  $this->description_en=$edit->description_en;
  $this->description_ar=$edit->description_ar;
  $this->price =$edit->price->price;
 
 }else{
  return redirect()->back();
 }


 }


public function addFeatures(){
 foreach($this->inputs['inputs'] as $input){
ProductFeature::create(
    [
        'product_id' => $this->edit_id,
        'name_ar' => $input['feature_ar'],
        'name_en' => $input['feature_en'],
    ]
);
 }
 successMessage();

}


 
public function showFeatures($id){
   $this->features=ProductFeature::with('product')->where('product_id',$id)->get();
    }
    

 
    public function showApplications ($id){
        $this->applications=ProductAplication::with('product')->where('product_id',$id)->get();
         }
         
     
 
public function deleteFeatures(){
   ProductFeature ::where('product_id',$this->edit_id)->delete();
    successMessage();
   
   }
   

   
public function addApplications(){
    foreach($this->inputs['inputs'] as $input){
   ProductAplication::create(
       [
           'product_id' => $this->edit_id,
           'name_ar' => $input['application_ar'],
           'name_en' => $input['application_en'],
       ]
   );
    }
    successMessage();
   
   }

 public function update(){
    $validatedData = $this->validate();
    $relations =[
        'price' =>[
            'price'=>$validatedData['price'],
            'updated_by'=>authName(),
        ]
        ];
        $record=$this->model::findOrFail($this->edit_id);
        $this->updateRecord($record,$validatedData,'products', $relations);
 }




   

 public function delete(){
 $record =$this->model::findOrFail($this->edit_id);
 $this->deleteRecord($record);
}


public function export() 
{
    try{   
        $this->check_permission('export products');
        return Excel::download(new ProductDetailsExport($this->startDate,$this->endDate), 'products.xlsx');
        $this->startDate ='';
        $this->endDate = '' ;
       successMessage();
    }catch (\Exception $e){
        errorMessage($e);
    }
}



#[Computed]
public function data(){

    return $this->model::backFilter($this->search,$this->sortfilter,$this->perpage);
}
 

public function render()
    {
   
        return view('livewire.Admin.products.Products');
     
    }
}








