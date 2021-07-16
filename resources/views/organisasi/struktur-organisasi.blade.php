<x-dashboard>
    @section("content")
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Struktur Organisasi</h2>
            <ol>
                <li><a href="index.html">Organisasi</a></li>
                <li>Struktur Organisasi</li>
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
                        <h3>Struktur Organisasi</h3>
                    </div>
                    <img src="{{asset('assets/img/slide/slide-3.jpg')}}" class="img-fluid center-image mb-4" alt="...">
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
</x-dashboard>