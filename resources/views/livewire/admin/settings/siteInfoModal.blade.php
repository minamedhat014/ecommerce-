<!-- add Modal -->

<x-app-modal id="addModel" type="store" title="Add to this list">
  <x-slot name="inputs">
   <x-form-input type="text" fname="Name" bname="name" icon="fa-solid fa-list" class="req" />
   <x-form-input type="text" fname="Descriptions" bname="discriptions" icon="fa-solid fa-pen" class="req" />
   <x-form-input type="text" fname="Seo key words" bname="key_words" icon="fa-solid fa-file" class="req" />
   <x-form-input type="phone" fname="Phone" bname="phone" icon="fa-solid fa-phone" class="req" />
   <x-form-input type="text" fname="Email" bname="email" icon="fa-solid fa-envelope" />
   <x-form-input type="text" fname="Address" bname="address" icon="fa-solid fa-location-dot"  />

   <x-form-photo fname="logo" bname="photo"> 
    <x-slot name="preview">
      <x-photo-preview :previews="$uploadedPreview" removeAction="removePhoto" />
    </x-slot>
</x-form-photo>

  </x-slot>
</x-app-modal>
 
<!--  edit Modal -->

<x-app-modal id="editModel" type="update" title=" Edit this list">
  <x-slot name="inputs">
    <x-form-input type="text" fname="Name" bname="name" icon="fa-solid fa-list" class="req" />
    <x-form-input type="text" fname="Discriptions" bname="discriptions" icon="fa-solid fa-pen" class="req" />
    <x-form-input type="text" fname="Seo key words" bname="key_words" icon="fa-solid fa-file" class="req" />
    <x-form-input type="phone" fname="Phone" bname="phone" icon="fa-solid fa-phone" class="req" />
    <x-form-input type="text" fname="Email" bname="email" icon="fa-solid fa-envelope" />
    <x-form-input type="text" fname="Address" bname="address" icon="fa-solid fa-location-dot"  />
    <x-form-photo fname="Logo" bname="photo"> 
      <x-slot name="preview">
        <x-photo-preview :previews="$uploadedPreview" removeAction="removePhoto" />
      </x-slot>
  </x-form-photo>
  
  
    
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