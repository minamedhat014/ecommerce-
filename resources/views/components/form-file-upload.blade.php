
@props(['fname', 'bname'])

<div class="col-lg-3 col-md-8 col-sm-12">
  <div class="feild ">
    <a id="uploadfile" wire:click="save"> </a>
    <label >{{$fname}}  <span {{ $attributes->merge(['class' => ''])}}> </span> </label>
    <i class="fa-solid fa-file"></i>
    <input type="file" class="feild-photo"  placeholder="select file"  id="{{ rand() }}".  id="photoinput" wire:model="{{$bname}}" >
    @if($errors->has($bname))
    <span class="feild span">{{ $errors->first($bname) }}</span>
    @endif
    <div wire:loading wire:target="{{$bname}}"> <i class="fa-solid fa-spinner fa-spin" id="image-loader"></i> please wait while uploading </div>
 </div> 
</div> 
<div>
  {{$preview}}
</div> 
 
