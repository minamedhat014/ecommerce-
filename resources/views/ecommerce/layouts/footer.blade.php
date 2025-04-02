<footer class="py-5">
    <div>
      <hr>
    <!-- Fixed bottom bar -->
   @livewire('layouts.fixed-bar')
      <div class="row footer">

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer-menu">
            <img src="{{siteLogo()}}" alt="logo" id="logo" class="footer-logo">
            <x-social-media-links />  
          </div>
        </div>
        

        <div class="col-md-2 col-sm-6">
          <div class="footer-menu">
          <ul>
          @foreach(frontLinks('footer') as $key => $link)
          <a href="{{$link->slug}}" class="nav-link">@if(app()->getLocale() == 'ar') {{$link->title_ar}} @else {{$link->title_en}} @endif</a>
          @endforeach
            </ul>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13814.438231569822!2d31.226074941951264!3d30.048057372763576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145840c7487e04cd%3A0x3377b407fe2c3754!2sDowntown%20Cairo%2C%20Bab%20Al%20Louq%2C%20Abdeen%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1743510004232!5m2!1sen!2seg" width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
       
      </div>

      <div class="col-md-6 copyright">
        © {{ now()->year }} <span class="site-name">   {{__('main_trans.All_rights_reserved')}} {{siteInfo("name")}}</span> 
      </div>

    </div>
  
        
     

  </footer >
  