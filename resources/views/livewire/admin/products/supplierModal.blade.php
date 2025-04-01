<!-- add Modal -->

<x-app-modal id="addModel" type="store" title="Add to this list">
  <x-slot name="inputs">
   <x-form-input type="text" fname="Name" bname="name" icon="fa-solid fa-file" class="req" />
   <x-form-input type="text" fname="Email" bname="email" icon="fa-solid fa-envelope" />
   <x-form-input type="text" fname="phone" bname="phone" icon="fa-solid fa-phone" />
   <x-form-input type="text" fname="Address" bname="address" icon="fa-solid fa-location-dot" />
   <x-form-input type="text" fname="Bank acount" bname="bank_account" icon="fa-solid fa-building-columns" />
   </x-slot>
</x-app-modal>
 
<!--  edit Modal -->

<x-app-modal id="editModel" type="update" title=" Edit this list">
  <x-slot name="inputs">
    <x-form-input type="text" fname="Name" bname="name" icon="fa-solid fa-file" class="req" />
    <x-form-input type="text" fname="Email" bname="email" icon="fa-solid fa-envelope" />
    <x-form-input type="text" fname="phone" bname="phone" icon="fa-solid fa-phone" />
    <x-form-input type="text" fname="Address" bname="address" icon="fa-solid fa-location-dot" />
    <x-form-input type="text" fname="Bank acount" bname="bank_account" icon="fa-solid fa-building-columns" />
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