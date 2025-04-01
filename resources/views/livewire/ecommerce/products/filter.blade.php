<div>
    <div wire:ignore.self class="offcanvas offcanvas-end"  tabindex="-1" id="offcanvasFilter" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <button type="button" class="offcanvas-close-btn"  data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa fa-close"></i>
               </button>
               <img src="{{asset('assets\front\images\filter.webp')}}" alt="" style="width: 100px; margin:auto">
        </div>
        <div class="offcanvas-body">
    
            <form wire:submit="filter" autocomplete="off"  enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
            
                </div>
                <span class="badge bg-success">{{__('main_trans.Price_filter')}} </span>

                    <div class="feild">
                        <label for="{{__('main_trans.lowest_price')}}">  {{ucfirst(__('main_trans.lowest_price'))}}  <span> </span></label> 
                        <input type="text" class="feild-input mb-5" name="price_low_range" id="price_low_range" placeholder="{{ucfirst(__('main_trans.lowest_price'))}}"  @if($errors->has($price_low_range))style=" box-shadow: 1px 3px 5px #f54747;" @endif wire:model.blur="price_low_range" >
                        @if($errors->has($price_low_range))
                        <span class="feild-span">{{ $errors->first($price_low_range) }}</span>
                        @endif
                        
                     </div>
    
                     <div class="feild">
                        <label for="{{__('main_trans.highest_price')}}">  {{ucfirst(__('main_trans.highest_price'))}}  <span> </span></label> 
                        <input type="text" class="feild-input mb-5" name="price_high_range" id="price_high_range" placeholder="{{ucfirst(__('main_trans.highest_price'))}}"  @if($errors->has($price_high_range))style=" box-shadow: 1px 3px 5px #f54747;" @endif wire:model.blur="price_high_range" >
                        @if($errors->has($price_high_range))
                        <span class="feild-span">{{ $errors->first($price_high_range) }}</span>
                        @endif
                     </div>    
               
              <hr>
      
        <x-form-checkbox fname="{{__('main_trans.category')}}" :options="$categories" bname="category_id" display="{{ app()->getLocale() == 'ar' ? 'name_ar' : 'name_en' }}"  value="id" icon="" />
      
        

        <button type="submit" class="btn custom-btn col-12">{{__('main_trans.filter')}}</button>
      </form>           
        </div>
      </div>

</div>
