<div>    
   <x-appToaster/> 

      <div wire:ignore.self class="offcanvas offcanvas-end"  tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasScrollingLabel">
          <div class="offcanvas-header">
              <button type="button" class="offcanvas-close-btn"  data-bs-dismiss="offcanvas" aria-label="Close">
                  <i class="fa fa-close"></i>
                 </button>
                 <img src="{{asset('assets\front\images\cart.webp')}}" alt="" style="width: 100px; margin:auto">
          </div>
          <div class="offcanvas-body">    
    @if($this->data)
    <div>
            <button type="button" wire:click="emptyCart" class="btn custom-btn  remove-all-cart"> <i class="fa fa-trash"> </i> {{__('main_trans.remove_all')}}</button>      
            <br>

   @foreach($this->data as $key => $row)
 <div class="row cart-row gap-2 justify-content-center">
    <button type="button"  wire:click="removeItem({{$row['id']}})" class="btn custom-btn col-1 remove-from-cart"> <i class="fa fa-trash"> </i></button>
    <div><img  class ="product-cart-image" src="{{$row['image']}}" alt="{{ $row['name'] }}"></div>    
     <div class="product-cart-name"> {{$row['name']}}</div>
     <div  class="col-4"> 
      <button wire:click="decreaseQuantity({{ $row['id']}})" class="px-2 bg-danger border-0 text-white rounded">-</button>
      <span class="mx-2">{{ $row['quantity'] }}</span>
      <button wire:click="increaseQuantity({{ $row['id']}})" class="px-2 bg-success  border-0 text-white rounded">+</button>
     </div>

  </div>
   @endforeach
   <div class="row justify-content-center">
   <div  class="btn custom-btn col-10">{{__('main_trans.total')}} : {{ number_format($total,0)}} {{ __('main_trans.egp') }}</div>
   <button  class="btn custom-btn col-10">{{__('main_trans.check_out')}}</button>
    </div> 
 </div>

  @else   
  <div class="row justify-content-center">
  <span  class="btn custom-btn col-10">{{__('main_trans.cart_is_empty')}}</span>
  </div>
  @endif
  
</div>
</div>
