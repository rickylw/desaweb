<x-dashboard>
    @section("content")

    <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Informasi Lain</h2>
            <ol>
                <li>Informasi Lain</li>
            </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us pt-10">
      <div class="container" data-aos="fade-up">

        <!-- Header -->

        <div class="row content">
          <div class="col-lg-12" data-aos="fade-right">
              
            <div class="underline-title">
                <h3>Informasi Lain</h3>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
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
        </div>

      </div>
    </section>
    @endsection
</x-dashboard>