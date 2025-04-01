
<div class="container-fluid ">
    <div class="row  text-center mt-4">
        <span class="page-title">{{__('main_trans.Recent_products') }}</span>
</div>
<div class="container text-center mt-4">
    

    <div class="row justify-content-evenly">
        
        @foreach($products as $key => $product)

        <div class="product-card col-lg-3 col-md-4 col-sm-5">
            @livewire('ecommerce.products.product-card', ['product' => $product], key($product->id))
            @livewire('ecommerce.products.product-modal')
        </div>
                      
        @endforeach 
    
</div>
    </div>
   
</div>
