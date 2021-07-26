<x-dashboard>
    @section("content")
    <?php $PATH = 'http://127.0.0.1:8000/' ?>

    <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Pencarian kata : {{$kataKunci}}</h2>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us pt-10">
      <div class="container" data-aos="fade-up">

        <!-- Header -->

        <div class="row content">
          <div class="col-lg-12" data-aos="fade-right">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($berita as $v)
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
                            @endif
                            Komentar</small></li>
                        </ul>
                        <div class="card-text row-4 text-ellipsis-4" style="text-align:justify"><?php echo $v->isi ?></div>
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
          </div>
          <div class="text-center mt-4">
              <a href="{{$berita->previousPageUrl()}}">
                  <i class="bx bx-left-arrow-alt"></i>
              </a>
              @for($i=1;$i<=$berita->lastPage();$i++)
                  <a href="{{$berita->url($i)}}">{{$i}}</a>
              @endfor
              <a href="{{$berita->nextPageUrl()}}">
                  <i class="bx bx-right-arrow-alt"></i>
              </a>
          </div>
        </div>

      </div>
    </section>
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