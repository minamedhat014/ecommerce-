<!-- add Modal -->

<x-app-modal id="addModel" type="store" title="Add to this list">
  <x-slot name="inputs">
   <x-form-select  value="id" display="name" :options="$types" fname="Page Category" bname="type_id" icon="fa-solid fa-circle-check" class="req"  />
   <x-form-select  value="id" display="title_en" :options="$pages" fname="Parent Page" bname="parent_id" icon="fa-solid fa-file"  />
   <x-form-input type="text" fname="English title" bname="title_en" icon="fa-solid fa-file" class="req" />
   <x-form-input type="text" fname="Arabic title" bname="title_ar" icon="fa-solid fa-file" class="req" />
   </x-slot>
</x-app-modal>
 
<!--  edit Modal -->

<x-app-modal id="editModel" type="update" title=" Edit this list">
  <x-slot name="inputs">
    <x-form-select  value="id" display="name" :options="$types" fname="Page Category" bname="type_id" icon="fa-solid fa-circle-check" class="req" />
    <x-form-select  value="id" display="title_en" :options="$pages" fname="Parent Page" bname="parent_id" icon="fa-solid fa-file"  />
    <x-form-input type="text" fname="English title" bname="title_en" icon="fa-solid fa-file" class="req" />
    <x-form-input type="text" fname="Arabic title" bname="title_ar" icon="fa-solid fa-file" class="req" />
  </x-slot>
</x-app-modal>
<!--  delete Modal -->

<x-app-modal id="deleteModel" type="delete" title="Remove">
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