<div>
    <div class="container-fluid ">
    @if($product)
    <div class="row  justify-content-center col-10">
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



</div>
@endif
</div>

</div>
