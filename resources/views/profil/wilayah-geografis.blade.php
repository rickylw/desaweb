<x-dashboard>
    @section("content")
    <?php $PATH = 'http://127.0.0.1:8000/' ?>
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Wilayah Geografis</h2>
            <ol>
                <li>Profil</li>
                <li>Wilayah Geografis</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                <div class="col-lg-8" data-aos="fade-right">
                    
                    <div class="underline-title">
                        <h3>Wilayah Geografis</h3>
                    </div>
                    <img src="{{$PATH.$profil->gambar_geografis}}" class="img-fluid center-image mb-4" alt="...">
                    <div class="isi-berita">
                        <?php echo $profil->geografis ?>                
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
                                    <h6 class="card-title">{{$v->judul}}</h6>
                                    <ul class="list-description px-0">
                                        <li class="d-flex align-items-center"><small><i class="bi bi-clock" id="item-description"></i> {{date('d M Y', strtotime($v->dibuat))}}</small></li>
                                        <li class="d-flex align-items-center">
                                        <small><i class="bi bi-person" id="item-description"></i> 
                                            @if ($v->jumlah_like == null)
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
                                    <h6 class="card-title">{{$v->judul}}</h6>
                                    <ul class="list-description px-0">
                                        <li class="d-flex align-items-center"><small><i class="bi bi-clock" id="item-description"></i> {{date('d M Y', strtotime($v->dibuat))}}</small></li>
                                        <li class="d-flex align-items-center">
                                        <small><i class="bi bi-person" id="item-description"></i> 
                                            @if ($v->jumlah_like == null)
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
                </div>
            </div>

        </div>
        </section><!-- End Blog Section -->

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