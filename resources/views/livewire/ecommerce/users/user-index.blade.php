<div>

    <div wire:ignore.self class="offcanvas offcanvas-end"  tabindex="-1" id="offcanvasUser" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <button type="button" class="offcanvas-close-btn"  data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa fa-close"></i>
               </button>
                 <img src="{{asset('assets\front\images\user.webp')}}"  alt="" style="width: 100px; margin:auto">
        </div>
        <div class="offcanvas-body">
    
            @if(Auth::check())
             <p>  {{__('main_trans.welcome_message')}}</p> <span> {{ Auth::user()->name }} </span>
             <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-dark">{{__('main_trans.logout')}}</button>
            </form>
             @else
             <div class="row text-center justify-content-center">
                <p>  {{__('main_trans.welcome_message')}}</p> 
                <a  class="btn custom-btn mt-5 col-8"  href="{{ route('login') }}">{{__('main_trans.login')}}</a>
                <a  class="btn custom-btn mt-5 col-8" href="{{ route('register') }}">{{__('main_trans.register')}}</a>
             </div>
             @endif
        </div>
      </div>

</div>