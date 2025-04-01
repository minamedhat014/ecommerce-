@props(['fname', 'bname'])

<div class="col-lg-3 col-md-8 col-sm-12">
  <div class="feild ">
    <a id="uploadPhoto"> </a>
    <label >{{$fname}}  <span {{ $attributes->merge(['class' => ''])}}> </span> </label>
    <i class="fa-solid fa-image"></i>
    <input type="file" class="feild-photo"  placeholder="select image"  id="{{ rand() }}".  wire:key="{{$bname}}" id="photoinput" wire:model="{{$bname}}"  @if($bname === 'photos')  multiple @endif>
    @if($errors->has($bname))
    <span class="feild span">{{ $errors->first($bname) }}</span>
    @endif
    <div wire:loading wire:target="{{$bname}}"> <i class="fa-solid fa-spinner fa-spin" id="image-loader"></i> please wait while uploading </div>
 </div> 
</div> 
 <div>
 {{$preview}}
</div> 



