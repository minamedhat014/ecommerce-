<div>
    
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="viewProductDetails" tabindex="-1" aria-labelledby="viewProductDetails" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content"> 
        <div class="modal-body">
            <button type="button" class="offcanvas-close-btn" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-close"></i></button>
@if($product)
            <div class="row col-12">
              <!-- الصورة الرئيسية -->
              <div class="col-md-6">
                <div class="col-md-12">
                  <img src="{{ $product->getFirstMediaUrl('products', 'webp') }}" 
                       loading="lazy" 
                       class="img-fluid main-image" 
                       style="width: 50%;" 
                       alt="{{ $product->name }}">
         </div>

         <div class="col-md-12">
          <br>
          <br>
                  @foreach($product->getMedia('products') as $image)
                      <img src="{{ $image->getUrl('webp') }}" 
                           alt="Product Thumbnail" 
                           class="img-thumbnail" 
                           style="width: 80px; cursor: pointer;"
                           onclick="document.querySelector('.main-image').src='{{ $image->getUrl('webp') }}'">
                  @endforeach
              </div>
          </div>
          <!-- تفاصيل المنتج -->
          <div class="col-md-6">
            <div class="col-md-12">
              <h2>{{ $product->name }}</h2>
              <p>{{ $product->description }}</p>
              @if($product->offers)   
              <span class=" badge bg-warning  text-muted text-decoration-line-through">{{ number_format($product->price?->final_price, 0) }} {{ __('main_trans.egp') }}</span>
             @endif 
              <span class="badge bg-success">{{ number_format($product->price?->final_price, 0) }} {{ __('main_trans.egp') }}</span>
              <button wire:click="addToCart({{ $product->id }})" class="btn add-to-cart-button">
                  <i class="fa-solid fa-bag-shopping "></i>
              </button>

              <a  href="{{route('showProduct',$product->slug)}}" class="btn  custom-btn">
              {{__('main_trans.show_product')}}
              </a>

        </div>
      </div>
    </div>
    @endif   
            
        </div>
      </div>
    </div>
  </div>


  @push('js-scripts')
    

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        var productModal = document.getElementById('viewProductDetails');
    
        productModal.addEventListener('hidden.bs.modal', function () {
            Livewire.dispatch('modal-closed'); 
        });
    });
    </script>


  @endpush
</div>
