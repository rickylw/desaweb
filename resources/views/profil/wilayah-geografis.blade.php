<x-dashboard>
    @section("content")
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Wilayah Geografis</h2>
            <ol>
                <li><a href="index.html">Profil</a></li>
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
                    <img src="{{asset($profil->gambar_geografis)}}" class="img-fluid center-image mb-4" alt="...">
                    <div class="isi-berita">
                        <?php echo $profil->geografis ?>                
                    </div>
                    {{-- <div class="mb-3">
                        <h6><b>Profil Desa</b></h6>
                        <hr>
                        <div class="row">
                            <p class="col-sm-4 mb-1"><small>Provinsi</small></p>
                            <p class="col-sm-8 mb-1"><small>Sumatera Selatan</small></p>
                        </div>
                        <div class="row">
                            <p class="col-sm-4 mb-1"><small>Kabupaten</small></p>
                            <p class="col-sm-8 mb-1"><small>Muara Enim</small></p>
                        </div>
                        <div class="row">
                            <p class="col-sm-4 mb-1"><small>Kecamatan</small></p>
                            <p class="col-sm-8 mb-1"><small>Rambang Danku</small></p>
                        </div>
                        <div class="row">
                            <p class="col-sm-4 mb-1"><small>Alamat Kantor Desa</small></p>
                            <p class="col-sm-8 mb-1"><small>Jl. Kabupaten Desa Dangku</small></p>
                        </div>
                        <div class="row">
                            <p class="col-sm-4 mb-1"><small>Nama Kepala Desa</small></p>
                            <p class="col-sm-8 mb-1"><small>Hoiri Jeffrison M SH</small></p>
                        </div>
                        <div class="row">
                            <p class="col-sm-4 mb-1"><small>No Telepon</small></p>
                            <p class="col-sm-8 mb-1"><small>085307340243</small></p>
                        </div>
                        <div class="row">
                            <p class="col-sm-4 mb-1"><small>Email</small></p>
                            <p class="col-sm-8 mb-1"><small>desadangku1@gmail.com</small></p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6><b>Kondisi Geografis</b></h6>
                        <hr>
                        <div class="row">
                            <p class="col-sm-4 mb-1"><small>Ketinggian Tanah</small></p>
                            <p class="col-sm-8 mb-1"><small>25 - 100	Mdpl</small></p>
                        </div>
                        <div class="row">
                            <p class="col-sm-4 mb-1"><small>Curah Hujan</small></p>
                            <p class="col-sm-8 mb-1"><small>Sedang</small></p>
                        </div>
                        <div class="row">
                            <p class="col-sm-4 mb-1"><small>Topografi Wilayah</small></p>
                            <p class="col-sm-8 mb-1"><small>Dataran</small></p>
                        </div>
                    </div> --}}
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