
<div class="container-fluid ">
    <div class="row  text-center mt-4">
        <span class="page-title">{{__('main_trans.Recent_products') }}</span>
</div>
<div class="container text-center mt-4">
    

   
        
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-2 justify-content-center">
            @foreach($products as $key => $product)
                <div class="col">
                    @livewire('ecommerce.products.product-card', ['product' => $product], key($product->id))
                    @livewire('ecommerce.products.product-modal', ['product' => $product])
                </div>
            @endforeach
        </div>
        
    

    </div>
   
</div>
