<section class="py-5">
    <div class="container-fluid">
      @php
      $features = [
        ['icon' => asset('assets/front/images/cash-on-delivery.webp'), 'text' => __('main_trans.cash_on_delivery')],
          ['icon' => asset('assets/front/images/fast-delivery.webp'), 'text' => __('main_trans.fast_delivery')],
          ['icon' => asset('assets/front/images/quality.webp'), 'text' => __('main_trans.quality_guarantee')],
          ['icon' =>  asset('assets/front/images/wallet.webp'), 'text' => __('main_trans.save_more')],
          ['icon' => asset('assets/front/images/gift.webp'), 'text' => __('main_trans.daily_offers')],
      ];
    @endphp
    
    <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-5">
      @foreach ($features as $feature)
        <div class="col">
          <div class="card tiny-banner mb-3 border-1">
            <div class="row">
              <div class="col-auto">
               <img src="{{$feature['icon']}}" alt="" class="tiny-image" loading="lazy">
              </div>
              <div class="col">
                <div class="card-body p-0">
                  <h6>{{ $feature['text'] }}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    
    </div>
  </section>