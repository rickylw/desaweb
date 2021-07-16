<x-dashboard>
    @section("content")
    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{asset('assets/img/slide/slide-1.jpg')}});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Welcome to <span>Company</span></h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{asset('assets/img/slide/slide-2.jpg')}});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Lorem Ipsum Dolor</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{asset('assets/img/slide/slide-3.jpg')}});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Sequi ea ut et est quaerat</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us pt-10">
      <div class="container" data-aos="fade-up">

        <!-- Header -->

        <div class="row content">
          <div class="col-lg-8" data-aos="fade-right">
              
            <div class="underline-title">
                <h3>Berita Terbaru</h3>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 g-4">
              <div class="col">
                  <div class="card h-100">
                    <img src="{{asset('assets/img/slide/slide-3.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title mb-0">Card title</h5>
                      <ul class="list-description list-inline">
                        <li class="list-inline-item"><small><i class="bi bi-clock" id="item-description"></i>19 Juli 2021</small></li>
                        <li class="list-inline-item">
                          <small><i class="bi bi-person" id="item-description"></i>12 Like</small>
                        </li>
                        <li class="list-inline-item"><small><i class="bi bi-chat-dots" id="item-description"></i>12 Komentar</small></li>
                      </ul>
                      <p class="card-text row-4 text-ellipsis-4">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-success"><a href="{{route('berita.detail')}}">Baca Selengkapnya...</a></small>
                    </div>
                  </div>
                </div>
                @for($i = 0; $i < 5; $i++)
                <div class="col">
                  <div class="card h-100">
                    <img src="{{asset('assets/img/slide/slide-3.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title mb-0">Card title</h5>
                      <ul class="list-description list-inline">
                        <li class="list-inline-item"><small><i class="bi bi-clock" id="item-description"></i>19 Juli 2021</small></li>
                        <li class="list-inline-item">
                          <small><i class="bi bi-person" id="item-description"></i>12 Like</small>
                        </li>
                        <li class="list-inline-item"><small><i class="bi bi-chat-dots" id="item-description"></i>12 Komentar</small></li>
                      </ul>
                      <p class="card-text row-4 text-ellipsis-4" style="text-align:justify">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-success"><a href="#">Baca Selengkapnya...</a></small>
                    </div>
                  </div>
                </div>
                @endfor
            </div>
          </div>

          <div class="col-lg-4 pt-4 pt-lg-0" data-aos="fade-left">
            <div>
              <div class="underline-title">
                  <h3>Populer</h3>
              </div>
              @for($i = 0; $i < 3; $i++)
              <div class="card mb-3 border-0">
                <div class="row g-0">
                  <div class="col-md-6">
                    <img src="{{asset('assets/img/slide/slide-2.jpg')}}" class="img-fluid" alt="...">
                  </div>
                  <div class="col-md-6">
                    <div class="card-body pt-0">
                      <h6 class="card-title mb-0">Berita ke-{{$i+1}}</h6>
                      <ul class="list-description">
                        <li class="d-flex align-items-center"><small><i class="bi bi-clock" id="item-description"></i>19 Juli 2021</small></li>
                        <li class="d-flex align-items-center">
                          <small><i class="bi bi-person" id="item-description"></i>12 Like</small>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              @endfor
            </div>
            <div>
              <div class="underline-title">
                  <h3>Informasi</h3>
              </div>
              @for($i = 0; $i < 3; $i++)
              <div class="card mb-3 border-0">
                <div class="row g-0">
                  <div class="col-md-6">
                    <img src="{{asset('assets/img/slide/slide-2.jpg')}}" class="img-fluid" alt="...">
                  </div>
                  <div class="col-md-6">
                    <div class="card-body pt-0">
                      <h6 class="card-title mb-0">Berita ke-{{$i+1}}</h6>
                      <ul class="list-description">
                        <li class="d-flex align-items-center"><small><i class="bi bi-clock" id="item-description"></i>19 Juli 2021</small></li>
                        <li class="d-flex align-items-center">
                          <small><i class="bi bi-person" id="item-description"></i>12 Like</small>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              @endfor
          </div>
        </div>

      </div>
    </section>

</main><!-- End #main -->
    @endsection
</x-dashboard>