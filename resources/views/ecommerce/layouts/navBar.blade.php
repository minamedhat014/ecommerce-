
  <div class="animation-up  nav-continer">
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

            <label class="switch nav-button-inside">
              <input type="checkbox" class="input" id="toggleTheme">
              <span class="sun ">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <g fill="#ffd43b">
                          <circle r="5" cy="12" cx="12"></circle>
                          <path d="m21 13h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm-17 0h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm13.66-5.66a1 1 0 0 1 -.66-.29 1 1 0 0 1 0-1.41l.71-.71a1 1 0 1 1 1.41 1.41l-.71.71a1 1 0 0 1 -.75.29zm-12.02 12.02a1 1 0 0 1 -.71-.29 1 1 0 0 1 0-1.41l.71-.66a1 1 0 0 1 1.41 1.41l-.71.71a1 1 0 0 1 -.7.24zm6.36-14.36a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm0 17a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm-5.66-14.66a1 1 0 0 1 -.7-.29l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.29zm12.02 12.02a1 1 0 0 1 -.7-.29l-.66-.71a1 1 0 0 1 1.36-1.36l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.24z"></path>
                      </g>
                  </svg>
              </span>
              <span class="moon ">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                      <path d="m223.5 32c-123.5 0-223.5 100.3-223.5 224s100 224 223.5 224c60.6 0 115.5-24.2 155.8-63.4 5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6-96.9 0-175.5-78.8-175.5-176 0-65.8 36-123.1 89.3-153.3 6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z"></path>
                  </svg>
              </span>
          </label>
      </ul>

        {{-- search box --}}
      

    </nav>



  </div>

