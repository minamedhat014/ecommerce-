
    <div class="fixed-bottom-bar">
        <!-- Your content here -->
          <div class="nav-button">
            <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
              <i class="fa-solid fa-cart-shopping footer-icon"></i>
            </span>
          </div>

  
          <div class="nav-button">
            <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
              <i class="fa-solid fa-magnifying-glass footer-icon"></i>
            </span>
          </div>
  
          <div class="nav-button">      
            <span  data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter" aria-controls="offcanvasFilter">
              <i class="fa-solid fa-layer-group footer-icon"></i>
            </span>
          </div>
  
  
            <div class="nav-button">
              @php
             $currentLocale = app()->getLocale();
             $switchToLocale = $currentLocale === 'ar' ? 'en' : 'ar';
             $flag = $currentLocale === 'ar' ? 'english.webp' : 'egypt.webp'; // تغيير اسم الصور حسب الحاجة
          @endphp
  
        <a href="{{ route('switchLang', $switchToLocale) }}"> 
          <i class="fa-solid fa-language footer-icon"></i>
        </a>
            </div>
         
  
{{--       
       
          <div class="nav-button">
          <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
            <img class="footer-icon" src="{{asset('assets/front/images/wish-list.webp')}}" alt="wish">
          </span>
        </div> --}}
        
        <div class="nav-button">
          <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasUser" aria-controls="offcanvasUser">
            <i class="fa-solid fa-user footer-icon"></i>
          </span>
        </div>
        
      
            
       
       
  
  
      </div>
      
  

