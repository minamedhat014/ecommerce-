
  <div class="container-fluid animation-down  nav-continer">
    <nav class="navbar">
  
      <div>
       <div class="rotation-container">
        <a href="{{route('home')}}">
        <img src="{{siteLogo()}}" alt=""  class="logo" >
        </a>
       </div>
        {{-- <h6 class="site-name"> {{siteInfo('name')}}</h6> --}}
      </div>
      <input type="checkbox" id="menu-toggle" />
      <label for="menu-toggle" class="menu-icon">
        <span></span>
        <span></span>
        <span></span>
      </label>
      <ul class="nav-links">
        @foreach(frontLinks('nav bar') as $key => $link)
        <li class="dropdown">
         <a href="#"  @if($link->children->isNotEmpty())  class="dropdown-toggle" @endif>
              @if(app()->getLocale() == 'ar') {{$link->title_ar}} @else {{$link->title_en}} @endif
              </a>
              <ul class="dropdown-menu">
                @if($link->children->isNotEmpty())
                @foreach($link->children as $child)
                <li>
                <a href="{{$child->slug}}"> @if(app()->getLocale() == 'ar') {{$child->title_ar}} @else {{$child->title_en}} @endif</a>
                </li>
                  @endforeach
                  @endif
              </ul>
            </li>  
            @endforeach

          
      </ul>

        {{-- search box --}}
      

    </nav>



  </div>

