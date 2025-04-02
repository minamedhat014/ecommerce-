<div>
    <section class="py-5 overflow-hidden">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
  
              <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                <span class="page-title mb-2" style="width: 100% ; text-align:center ;">{{__('main_trans.categories') }}</span>
  
                <div class="d-flex align-items-center">
                  <a href="#" class="btn-link text-decoration-none">{{__('main_trans.view_all_categories')}} →</a>
                  <div class="swiper-buttons">
                    <button class="swiper-prev category-carousel-prev btn btn-yellow swiper-button-disabled" disabled="" tabindex="-1" aria-label="Previous slide" aria-controls="swiper-wrapper-ca7274a274b79724" aria-disabled="true">❮</button>
                    <button class="swiper-next category-carousel-next btn btn-yellow" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-ca7274a274b79724" aria-disabled="false">❯</button>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
  
              <div class="category-carousel swiper swiper-initialized swiper-horizontal">
                <div class="swiper-wrapper" id="swiper-wrapper-ca7274a274b79724" aria-live="polite">
                    @foreach(productCategories() as $category)
                    <div class="swiper-slide">
                        <div class="card-category">
                  <a href="{{ route('category.show', $category->slug) }}" class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 12" >
                    <img src="{{ $category->getFirstMediaUrl('categories','webp') }}" loading="lazy" class="card-img-top img-fluid category-image" alt="{{ $category['name'] }}">
                    <span class="category-title">{{$category->name}}</span>
                  </a>
                  </div>
                  </div>
                  @endforeach
                </div>
              <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
  
            </div>
          </div>
        </div>
      </section>
</div>
