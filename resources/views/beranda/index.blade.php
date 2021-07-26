<x-dashboard>
    @section("content")

    <?php $PATH = 'http://127.0.0.1:8000/' ?>
    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        @foreach ($beritaUtama as $k=>$v)
          <div class="carousel-item <?php echo ($k == 0) ? 'active' : '' ?>" style="background-image: url({{$PATH.$v->foto}});">
            <div class="carousel-container">
              <div class="carousel-content animate__animated animate__fadeInUp">
                <h2>{{$v->judul}}</h2>
                <div class="text-ellipsis-4 isi-berita">
                  <?php echo $v->isi ?>
                </div>
                <div class="text-center"><a href="{{route('berita.detail', $v->id)}}" class="btn-get-started">Baca Selengkapnya...</a></div>
              </div>
            </div>
          </div>
        @endforeach

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
                @foreach($beritaTerbaru as $v)
                <div class="col">
                  <div class="card h-100">
                    <img src="{{$PATH.$v->foto}}" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title mb-0">{{$v->judul}}</h5>
                      <ul class="list-description list-inline">
                        <li class="list-inline-item"><small><i class="bi bi-clock" id="item-description"></i>{{date('d M Y', strtotime($v->dibuat))}}</small></li>
                        <li class="list-inline-item">
                          <small><i class="bi bi-person" id="item-description"></i>
                            @if($v->jumlah_like == null)
                              0
                            @else 
                              {{$v->jumlah_like}}
                            @endif
                            Like</small>
                        </li>
                        <li class="list-inline-item"><small><i class="bi bi-chat-dots" id="item-description"></i>
                          @if ($v->jumlah_komentar == null)
                            0
                          @else
                            {{$v->jumlah_komentar}}
                          @endif Komentar</small></li>
                      </ul>
                      <div class="card-text row-4 text-ellipsis-4" style="text-align:justify">
                        <?php echo $v->isi ?>
                      </div>
                    </div>
                    <div class="card-footer">
                      <small class="text-success">
                        <form action="{{route('berita.detail', $v->id)}}" id="formDetail" method="GET">
                          @csrf
                          @method("GET")
                          <button class="btn btn-link text-success p-0" style="text-decoration:none" type="submit">Baca Selengkapnya...</button>
                        </form>
                      </small>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{$beritaTerbaru->previousPageUrl()}}">
                    <i class="bx bx-left-arrow-alt"></i>
                </a>
                @for($i=1;$i<=$beritaTerbaru->lastPage();$i++)
                    <a href="{{$beritaTerbaru->url($i)}}">{{$i}}</a>
                @endfor
                <a href="{{$beritaTerbaru->nextPageUrl()}}">
                    <i class="bx bx-right-arrow-alt"></i>
                </a>
            </div>
          </div>

          <div class="col-lg-4 pt-4 pt-lg-0" data-aos="fade-left">
            <div>
              <div class="underline-title">
                  <h3>Populer</h3>
              </div>
              @foreach($beritaPopuler as $v)
                <div class="card mb-3 border-0">
                  <div class="row g-0">
                    <div class="col-md-6">
                      <a href="{{route('berita.detail', $v->id)}}">
                        <img src="{{$PATH.$v->foto}}" class="img-fluid" alt="...">
                      </a>
                    </div>
                    <div class="col-md-6">
                      <div class="card-body pt-0">
                        <h6 class="card-title mb-0">{{$v->judul}}</h6>
                        <ul class="list-description">
                          <li class="d-flex align-items-center"><small><i class="bi bi-clock" id="item-description"></i>{{date('d M Y', strtotime($v->dibuat))}}</small></li>
                          <li class="d-flex align-items-center">
                            <small><i class="bi bi-person" id="item-description"></i>
                              @if($v->jumlah_like == null)
                                0
                              @else 
                                {{$v->jumlah_like}}
                              @endif
                              Like</small>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            <div>
              <div class="underline-title">
                  <h3>Informasi Lainnya</h3>
              </div>
              @if (count($beritaInformasiLainnya) == 0)
                  <p>Belum Ada Berita</p>
              @else
                @foreach($beritaInformasiLainnya as $v)
                  <div class="card mb-3 border-0">
                    <div class="row g-0">
                      <div class="col-md-6">
                        <a href="{{route('berita.detail', $v->id)}}">
                          <img src="{{$PATH.$v->foto}}" class="img-fluid" alt="...">
                        </a>
                      </div>
                      <div class="col-md-6">
                        <div class="card-body pt-0">
                          <h6 class="card-title mb-0">{{$v->judul}}</h6>
                          <ul class="list-description">
                            <li class="d-flex align-items-center"><small><i class="bi bi-clock" id="item-description"></i>{{date('d M Y', strtotime($v->dibuat))}}</small></li>
                            <li class="d-flex align-items-center">
                              <small><i class="bi bi-person" id="item-description"></i>
                                @if($v->jumlah_like == null)
                                  0
                                @else 
                                  {{$v->jumlah_like}}
                                @endif
                                Like</small>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
          </div>
        </div>

      </div>
    </section>

</main><!-- End #main -->
    @endsection

    @section('content-contact')        
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="{{$website->twitter}}" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="{{$website->facebook}}" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="{{$website->instagram}}" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="{{$website->youtube}}" class="youtube"><i class="bx bxl-youtube"></i></a>
      </div>
    @endsection
</x-dashboard>