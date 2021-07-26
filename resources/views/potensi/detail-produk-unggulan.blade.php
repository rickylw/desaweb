<x-dashboard>
    @section("content")
    <?php $PATH = 'http://127.0.0.1:8000/' ?>
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Produk Unggulan</h2>
            <ol>
                <li>Produk Unggulan</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                <div class="col-lg-8" data-aos="fade-right">
                    
                    <h3>{{$produkUnggulan->nama}}</h3>
                    <img src="{{$PATH.$produkUnggulan->foto}}" class="img-fluid center-image mb-4" alt="...">
                    <div class="isi-berita">
                        <?php echo $produkUnggulan->deskripsi ?>
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
                                <h6 class="card-title">Berita ke-{{$i+1}}</h6>
                                <ul class="list-description px-0">
                                    <li class="d-flex align-items-center"><small><i class="bi bi-clock" id="item-description"></i> 19 Juli 2021</small></li>
                                    <li class="d-flex align-items-center">
                                    <small><i class="bi bi-person" id="item-description"></i> 12 Like</small>
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
                            <h3>Informasi Lainnya</h3>
                        </div>
                        @for($i = 0; $i < 3; $i++)
                        <div class="card mb-3 border-0">
                            <div class="row g-0">
                            <div class="col-md-6">
                                <img src="{{asset('assets/img/slide/slide-2.jpg')}}" class="img-fluid" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body pt-0">
                                <h6 class="card-title">Berita ke-{{$i+1}}</h6>
                                <ul class="list-description px-0">
                                    <li class="d-flex align-items-center"><small><i class="bi bi-clock" id="item-description"></i> 19 Juli 2021</small></li>
                                    <li class="d-flex align-items-center">
                                    <small><i class="bi bi-person" id="item-description"></i> 12 Like</small>
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