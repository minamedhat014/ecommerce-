<div>
    <div>
        <h3>My Wishlist</h3>
    
        @foreach($wishlistItems as $productId)
            <div class="wishlist-item">
                <span>Product ID: {{ $productId }}</span>
                <button wire:click="toggle({{ $productId }})" class="btn btn-sm btn-danger">Remove</button>
            </div>
        @endforeach
    </div>
    
</div>
