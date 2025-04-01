<div>

   @foreach($inputs as $index => $input)

   <div class="row">

      <div class="feilds-container col-lg-4 col-md-12 col-sm-12">

         <input type="text" 
                class="dynamic-input {{ !empty($input[$name_ar] ?? '') ? 'value-incerted' : '' }}"  
                wire:model="inputs.{{ $index }}.{{ $name_ar }}" 
                placeholder="Enter {{ $name_ar }}">
         
         @error("inputs.{$index}.{$name_ar}")
             <span class="text-danger input-error">{{ $message }}</span>
         @enderror

         </div>

         <div class="feilds-container col-lg-4 col-md-12 col-sm-12">
            <input type="text" 
            class="dynamic-input {{ !empty($input[$name_en] ?? '') ? 'value-incerted' : '' }}"  
            wire:model="inputs.{{ $index }}.{{ $name_en }}" 
            placeholder="Enter {{ $name_en }}">
  
     @error("inputs.{$index}.{$name_en}")
         <span class="text-danger input-error">{{ $message }}</span>
     @enderror
     </div>

     
     <div class="feilds-container col-lg-4 col-md-12 col-sm-12">
     <button wire:click.prevent="removeInput({{ $index }})" class="remove-btn">
      <i class="fa-solid fa-circle-minus text-danger"></i>
  </button>
  
  <button wire:click.prevent="addInput" class="add-btn">
      <i class="fa-solid fa-square-plus text-success"></i>
  </button>

   </div>
   </div>
  
 
@endforeach


</div>


@push('css')
<style>

    .feilds-container {
position: relative;
font-weight: 300;
    }


.dynamic-input{
 width: 90%;
 height: var(--input-hight);
    padding: 12px;
    margin: 3%;
    outline: none;
    font-size: 16px;
    text-align:center;
    color:#002659;
    border-radius: 5px ;
    font-weight: 400;
    transition: .5s ease ;
    background-color: #ffff ;
    border: none;
    box-shadow: 1px 2px 5px #57b4a97a;

 }

 .remove-btn{
    display: block;
  outline: none;
  position: absolute;
  top: 50%;
  left:20%;
  transform: translateY(-50%);
  background: transparent;
  transition: .5s ease ;
  border: none;
 }
 .add-btn{
    display: block;
    outline: none;
  position: absolute;
  transform: translateY(-50%);
  top: 50%;
  left:10%;
  background: transparent;
  transition: .5s ease ;
  border: none;


 }
.input-error{
position: absolute;
bottom:-15%;
left: 10%;

}
 .value-incerted{
    outline: rgb(37, 243, 37);
    border: 1px solid rgb(37, 243, 37);

 }

</style>
@endpush