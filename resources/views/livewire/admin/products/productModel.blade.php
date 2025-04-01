
<!-- add Modal -->
<x-app-modal id="addProductsModel" type="store" title=" Add Products">

  <x-slot name="inputs">
    <x-form-input  type="text" fname="English name" bname="name_en" icon="fa-brands fa-product-hunt" class="req"  />
    <x-form-input  type="text" fname="Arabic name" bname="name_ar" icon="fa-brands fa-product-hunt" class="req"  /> 
    <x-form-select fname="Category"  :options="$categories"  bname="category_id"  value="id"  display="name_en"  icon="fa-solid fa-circle-check"  class="req" />
    <x-form-input  type="text" fname="English description" bname="description_en" icon="fa-solid fa-pen"   />
    <x-form-input  type="text" fname="Arabic description" bname="description_ar" icon="fa-solid fa-pen"   />
    <x-form-input  type="text" fname="End user price" bname="price" icon="fa-solid fa-money-bill"  class="req" />  
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-pen"   />
    <x-form-photo fname="product images"  bname="photos">
      <x-slot name="preview">
        <x-photo-preview :previews="$uploadedPreviews" removeAction="removePhoto" />
    </x-slot>
    </x-form-photo>
  </x-slot>
</x-app-modal>
 
{{-- edit Modal            --}}

<x-app-modal id="editProductsModel" type="update" title=" Edit Products">

  <x-slot name="inputs">
    <x-form-input  type="text" fname="English name" bname="name_en" icon="fa-brands fa-product-hunt" class="req"  />
    <x-form-input  type="text" fname="Arabic name" bname="name_ar" icon="fa-brands fa-product-hunt" class="req"  /> 
    <x-form-select fname="Category"  :options="$categories"  bname="category_id"  value="id"  display="name_en"  icon="fa-solid fa-circle-check"  class="req" />
    <x-form-input  type="text" fname="English description" bname="description_en" icon="fa-solid fa-pen"   />
    <x-form-input  type="text" fname="Arabic description" bname="description_ar" icon="fa-solid fa-pen"   />
    <x-form-input  type="text" fname="End user price" bname="price" icon="fa-solid fa-money-bill"  class="req" />  
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-pen"   />
    <x-form-photo fname="product images"  bname="photos">
      <x-slot name="preview">
        <x-photo-preview :previews="$uploadedPreviews" removeAction="removePhoto" />
    </x-slot>
    </x-form-photo>
  </x-slot>
</x-app-modal>
   
<!--  delete Modal -->

<x-app-modal id="deleteProductsModel" type="delete" title=" Remove Products">

  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>

  
<x-app-modal id="activateModal" type="activate" title="Activate this Record">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to activate this record ? </p>
  </x-slot>
</x-app-modal>


<x-app-modal id="deactivateModal" type="deactivate" title="Deactivate this Record">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to deactivate this record ? </p>
  </x-slot>
</x-app-modal>




<x-app-modal id="AddFeatureModal" type="addFeatures" title="you can add features to this product">
  <x-slot name="inputs">
    @livewire('admin.settings.dynamic-input' , ['name_ar' => 'feature_ar', 'name_en' => 'feature_en'])
  </x-slot>
</x-app-modal>

{{-- -------------------------------------------------------------------------------- --}}

<x-app-modal id="showFeatureModal" type=" " title="list of features to this product">
  <x-slot name="inputs">
    @if (count($features) > 0)
    <table id="example1" class="table-light table-hover table-sm table-bordered text-center " style="width: -webkit-fill-available;">
      <thead class="custom-table-header" >
        <tr>
          <th>Product En</th>
          <th>Product Ar</th>
          <th>Feature En</th>
          <th>Feature Ar</th>
          </tr>
          </thead>
          <tbody class="custom-table-body" >
            @foreach($features as $feature)
            <tr>
              <td>{{$feature->product?->name_en}}</td>
              <td>{{$feature->product?->name_en}}</td>
              <td>{{$feature->name_en}}</td>
              <td>{{$feature->name_ar}}</td>
              </tr>
              @endforeach
          </tbody>
    </table>
@else
<p class="text-danger"> no features to this product </p>
@endif
 
  </x-slot>
</x-app-modal>

{{-- ------------------------------------------------------------------------- --}}

<x-app-modal id="showApplicationModal" type=" " title="list of applications to this product">
  <x-slot name="inputs">
    @if (count($applications) > 0)
    <table id="example1" class="table-light table-hover table-sm table-bordered text-center " style="width: -webkit-fill-available;">
      <thead class="custom-table-header" >
        <tr>
          <th>Product En</th>
          <th>Product Ar</th>
          <th>application En</th>
          <th>application Ar</th>
          </tr>
          </thead>
          <tbody class="custom-table-body" >
            @foreach($applications as $row)
            <tr>
              <td>{{$row->product?->name_en}}</td>
              <td>{{$row->product?->name_en}}</td>
              <td>{{$row->name_en}}</td>
              <td>{{$row->name_ar}}</td>
              </tr>
              @endforeach
          </tbody>
    </table>
@else
<p class="text-danger"> no applications to this product </p>
@endif
 
  </x-slot>
</x-app-modal>


<x-app-modal id="deleteProductsfeaturesModel" type="deleteFeatures" title=" Remove Products features">

  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>



<x-app-modal id="addApplicationModal" type="addApplications" title="you can add application to this product">
  <x-slot name="inputs">
  
    @livewire('admin.settings.dynamic-input' , ['name_ar' => 'application_ar', 'name_en' => 'application_en'])
  </x-slot>
</x-app-modal>



<x-app-modal id="deleteProductApplicationModel" type="deleteApplications" title=" Remove Product application">

  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>
