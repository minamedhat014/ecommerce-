<div>

  <div  wire:ignore.self class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasSearch" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <button type="button" class="offcanvas-close-btn"  data-bs-dismiss="offcanvas" aria-label="Close">
       <i class="fa fa-close"></i>
      </button>
    </div>
    <div class="offcanvas-body">
      <div class="input-group">
        <!-- Search Icon -->
        <i class="fas fa-search text-muted main-search-icon"></i>
        <!-- Search Input -->
        <input 
            type="text" 
            id="searchBox" 
            class="main-front-search" 
            placeholder="{{ __('main_trans.search') }}" 
            autocomplete="off" style="width: 100%" wire:model.live="search">

        <!-- Clear Button -->
        <button 
id="clearButton" 
class="search-clear-btn" 
type="button" 
wire:click="clearSearch" 
style="display: {{ $search ? 'inline-block' : 'none' }};">
<i class="fas fa-times"></i>
</button>
    </div>

<div>
  <p> 
     @if ($errors->has('search'))
    <div class="alert alert-danger">{{ $errors->first('search') }}</div>
@endif
</p>

@if($products)

    @foreach($products as $key => $row)
<div class="search-row">
  <a href="">
           <span><img  class ="search-image" src="{{$row->getFirstMediaUrl('products','thumb')}}" alt="{{ $row->name_en }}"></span>    
       <span>{{$row->name}}</span>
      <span class="badge bg-primary">{{$row->category?->name}}</span>
      <span class="badge bg-info">{{ number_format($row->price?->price,0)}} {{ __('main_trans.egp') }}</span>
    </a>
  </div>
    @endforeach
@else
    <p class="text-center">
      <img src="{{asset('assets\front\images\no-results.webp')}}" alt="" style="width: 150px;">
      {{ __('main_trans.no_result') }}
    </p>
@endif

    </div>
  </div>

</div>


  </div>



