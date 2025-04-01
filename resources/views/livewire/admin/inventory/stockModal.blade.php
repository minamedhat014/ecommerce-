<!-- add Modal -->

<x-app-modal id="addModel" type="store" title="Add to this list">
  <x-slot name="inputs">
    <x-form-select fname="Product" :options="$products" bname="product_id"  value="id" display="sku" icon="fa-solid fa-product" class="req" />
    <x-form-select fname="Supplier" :options="$suppliers" bname="supplier_id"  value="id" display="name" icon="fa-solid fa-circle-check" class="req"  />
   </x-slot>
</x-app-modal>

<x-app-modal id="newStockModel" type="addNewStock" title="Add new stock">
  <x-slot name="inputs"> 
   <x-form-input type="text" fname="quantity" bname="quantity" icon="fa-solid fa-q" />
   <x-form-input  type="text" fname="Cost price" bname="price" icon="fa-solid fa-money-bill" class="req"  /> 
   </x-slot>
</x-app-modal>
 
<!--  edit Modal -->

<x-app-modal id="editModel" type="update" title=" Edit this list">
  <x-slot name="inputs">
    <x-form-select fname="Product" :options="$products" bname="product_id"  value="id" display="sku" icon="fa-solid fa-product" class="req" />
  </x-slot>
</x-app-modal>
<!--  delete Modal -->

<x-app-modal id="deleteModel" type="delete" title="Remove">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>


