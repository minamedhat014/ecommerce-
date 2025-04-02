<div class="card border-1 shadow-sm m-2">
    <!-- Product Image -->
    <div class="position-relative overflow-hidden">
        @if($product->offers)   
            <span class="badge bg-info product-offer start-2 m-2">-{{ 10 }}%</span>
        @endif
        <a  href="{{route('showProduct',$product->slug)}}" target="_blank">
        <img src="{{ $product->getFirstMediaUrl('products','webp') }}" loading="lazy" class="card-img-top img-fluid product-image" alt="{{ $product['name'] }}">
        </a>
    </div>

    <!-- Product Info -->
    <div class="card-body">
        <h6 class="card-title text-truncate ">{{ $product->name }}</h6>
        @if($product->offers)   
        <span class="text-muted text-decoration-line-through">{{ number_format($product->price?->price, 0) }} {{ __('main_trans.egp') }}</span>
       @endif 
       <span class="badge bg-success">{{ number_format($product->price?->price, 0) }} {{ __('main_trans.egp') }}</span>
    </div>

    <!-- Add to Cart Button -->
    <div class="text-center">
        <button type="button" class="btn view-product" wire:loading.attr="disabled" target="_blank" wire:click="viewProduct({{$product->id}})" data-bs-toggle="modal" data-bs-target="#viewProductDetails">
            <i class="fa-solid fa-eye" wire:loading.remove></i>
            <i wire:loading  class="fa-solid fa-spinner fa-spin"></i>
          </button>
       
          <button wire:click="addToCart({{ $product->id }})" class="btn add-to-cart-button"
            >
            <i class="fa-solid fa-bag-shopping "></i>
        </button>
    </div>

</div>
