@props(['fname','icon','options','display'])

<div>

    <div class="feild col-lg-12">
    <label > {{ucfirst($fname)}}  <span {{ $attributes->merge(['class' => ''])}}> </span> </label>
    <i class="{{$icon}} "></i>
    <input type="search" class="feild-input "  placeholder="Search here" wire:model.live ="check_search">
    </div> 
    
    <div class="check_option" >
      @foreach ($options as  $option )
      <div class="form-check text-center m-2 ">
          <input class="form-check-input " type="checkbox" value="{{ $option->id}}" wire.model="checked_ids"  wire:click="checked({{ $option->id}})" id="{{$option->id}}">
          <label class="form-check-label" for="{{$option->id}}">
              {{$option[$display]}}  
          </label>
        </div>
      @endforeach 
    </div>
  </div>
