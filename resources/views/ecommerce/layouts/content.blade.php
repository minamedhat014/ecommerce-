<div class="content" id="content" >
    @yield('content')
    <button id="scrollToTop" class="scroll-top"><i class="fa-solid fa-up-long"></i></button>

    {{-- {{ Breadcrumbs::render('home') }} --}}
   @livewire('ecommerce.products.product-search')
    @livewire('ecommerce.products.filter')
    @livewire('ecommerce.products.cart')
    @livewire('ecommerce.users.user-index') 
   
  <!-- /.content -->

  </div>