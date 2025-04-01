
<div>
<x-app-modal id="addUserModal" type="store" title="Add user">
  <x-slot name="inputs">
   <x-form-input type="text" fname="Name" class="req" bname="name" icon="fa-solid fa-user-plus"/>
   <x-form-input type="email" class="req" fname="Email" bname="email" icon="fa-solid fa-envelope"/>
   <x-form-input type="password"  class="req" fname="Password" bname="password" icon="fa-solid fa-key"/>
   <x-form-input type="phone" fname="phone" bname="phone" icon="fa-solid fa-phone"/>
   <x-form-photo fname="Image"  bname="photo">
    <x-slot name="preview">
      <x-photo-preview :previews="$uploadedPreview" removeAction="removePhoto" />
    </x-slot>
    </x-form-photo>

    

  </x-slot>
</x-app-modal>

<!--  Edit Modal -->

<x-app-modal id="editUserModal" type="update" title="Edit user">
  <x-slot name="inputs">
   <x-form-input type="text" fname="Name" bname="name" class="req"  icon="fa-solid fa-user-plus"/>
   <x-form-input type="email" fname="Email" bname="email" class="req"  icon="fa-solid fa-envelope"/>
   <x-form-input type="password" fname="Password" class="req"  bname="password" icon="fa-solid fa-key"/>
   <x-form-input type="phone" fname="phone" bname="phone" class="req"  icon="fa-solid fa-phone"/>
   <x-form-photo fname="Image"  bname="photo">
    <x-slot name="preview">
      <x-photo-preview :previews="$uploadedPreview" removeAction="removePhoto" />
    </x-slot>
    </x-form-photo>


  </x-slot>
</x-app-modal>

<!--  assign Modal -->


<x-app-modal id="assignRole" type="assignRoles" title="Assign Roles" >
  <x-slot name="inputs">
  <x-form-multi-select  display="name" class="req"   :options="$roles" fname="Assgin roles" bname="assigned_roles"  value="name" icon="fa-solid fa-user-lock" />
  </x-slot>
</x-app-modal> 

  

<!--  remove roles  Modal -->

<x-app-modal id="removeRoles" type="removeRoles" title="Remove Roles">
  <x-slot name="inputs">
    <p class="text-danger"> Are you sure you want to delete this Roles ? </p>  
  </x-slot>
</x-app-modal>
  
<!--  delete Modal -->

<x-app-modal id="deleteUserModel" type="delete" title="Remove User">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>

</div>


