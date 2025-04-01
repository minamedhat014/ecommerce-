<!DOCTYPE html>
  <html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" data-theme="light">
   @include('ecommerce.layouts.style')
  <body> 
 @include('ecommerce.layouts.navBar')
 @include('ecommerce.layouts.content')
 @include('ecommerce.layouts.footer')
 @include('ecommerce.layouts.script')
  </body>
</html>