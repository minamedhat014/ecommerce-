<!-- add Modal -->

<x-app-modal id="addModel" type="store" title="Add to this list">
  <x-slot name="inputs">
   <x-form-input type="text" fname="Name" bname="name" icon="fa-solid fa-image" class="req" />
   <x-form-input type="text" fname="speed in milisecond" bname="speed" icon="fa-solid fa-truck-fast" class="req" />
   <x-form-photo fname="Images"  bname="photos">
    <x-slot name="preview">
      <x-photo-preview :previews="$uploadedPreviews" removeAction="removePhoto" />
    </x-slot>
    </x-form-photo>
  </x-slot>
</x-app-modal>
 
<!--  edit Modal -->

<x-app-modal id="editModel" type="update" title=" Edit this list">
  <x-slot name="inputs">
    <x-form-input type="text" fname="Name" bname="name" icon="fa-solid fa-image" class="req" />
    <x-form-input type="text" fname="speed in milisecond" bname="speed" icon="fa-solid fa-truck-fast" class="req" />
    <x-form-photo fname="Images"  bname="photos">
        <x-slot name="preview">
          <x-photo-preview :previews="$uploadedPreviews" removeAction="removePhoto" />
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


<x-app-modal id="iamgeDisplay" type="" title="Images">
  <x-slot name="inputs">

    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
         @if($images)
          @foreach($images as $image)
          <div class="carousel-item active ">
            <img src="{{ asset($image->getUrl()) }}" class="corsal-image" alt="..." >
          </div>  
          @endforeach
          @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon " aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      </div>

  </x-slot>
</x-app-modal>
