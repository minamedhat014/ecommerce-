<?php

namespace App\Http\Livewire\Admin\Inventory;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Supplier;
use App\Traits\HasCrud;
use Livewire\Component;
use App\Traits\HasTable;
use App\Traits\HasStockTransaction;
use Livewire\Attributes\Computed;

class stocks extends Component
{
    use HasTable;
    use HasCrud;
    use HasStockTransaction;

public $model= Stock::class;
public $products=[];
public $product_id;
public $quantity;
public $price;
public $suppliers=[];
public $supplier_id;

protected $write_permission ='write stock';



public function mount(){
    $this->suppliers =Supplier::where('status','active')->get();
    $this->products = Product::where('status','active')->get(['id','sku']);
    }
    

    
public function closeModal()
{
 $this->reset([
    'product_id','price','supplier_id'
]);

}



protected function rules()
{
return [ 
    'product_id'=> [
        'required',
        'numeric',
        // 'unique:stocks,product_id,' . $this->edit_id,
    ],
    'supplier_id' => 'required',
];
}



public function store(){
$validatedData = $this->validate();
   $this->storeRecord($this->model,$validatedData);
}


public function update(){
    $validatedData = $this->validate();
        $record=$this->model::findOrFail($this->edit_id);
        $this->updateRecord($record,$validatedData);
    }

    public function delete(){
        $record =$this->model::findOrFail($this->edit_id);
        $this->deleteRecord($record);
       }

public function edit(int $id){
$edit= Product::findOrFail($id);
if($edit){
$this-> edit_id= $id;
$this->product_id =$edit->product_id;
$this->price =$edit->price->price;
}else{
return redirect()->back();
}
}


public function addNewStock()
{
    $validatedData = $this->validate([
        'quantity' => 'required|numeric',
        'price' => 'required|numeric|between:0,100000.99',
    ]);
$this->Addstock($this->edit_id,$validatedData['quantity'],$validatedData['price']);
   
}



    #[Computed]
    public function data(){
    
        return $this->model::backFilter($this->search,$this->sortfilter,$this->perpage);
    }
     
    public function render()
    {
        return view('livewire.admin.inventory.stocks');
    }
}
