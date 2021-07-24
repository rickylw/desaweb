<x-dashboard>
    @section("content")
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Sejarah</h2>
            <ol>
                <li>Profil</li>
                <li>Sejarah</li>
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
                        <h3>Sejarah</h3>
                    </div>
                    <img src="{{asset($profil->gambar_sejarah)}}" class="img-fluid center-image mb-4" alt="...">
                    <div class="isi-berita">
                        <?php echo $profil->sejarah ?>                
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
                                      <img src="{{asset($v->foto)}}" class="img-fluid" alt="...">
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
                                      <img src="{{asset($v->foto)}}" class="img-fluid" alt="...">
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
</x-dashboard>