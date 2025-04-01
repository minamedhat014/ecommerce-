<section >

  @if(bannerImages())
    <div class="container-fluid animation-up" id="banner-section" >
      <div class="col-12">
       
        <div id="carouselExampleAutoplaying" class="carousel slide banner" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach(bannerImages() as $key => $image)
            <div class="carousel-item active" data-bs-interval="{{bannerSpeed()}}">
              <img src="{{$image}}" class="d-block w-100" alt="">
            </div>
            @endforeach

          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
          
        </div>

</div>
    </div>
    @endif
    
  </section>
