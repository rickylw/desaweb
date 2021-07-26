<x-dashboard>
    @section("content")
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Kependudukan</h2>
            <ol>
                <li><a href="index.html">Potensi</a></li>
                <li>Kependudukan</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                <div>
                    <h4 class="sub-title mb-4">Data Penduduk</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 mb-2">
                            <h5 class="sub-title mb-3">Berdasarkan Usia</h5>
                            <div class="row mx-2 my-2">
                                <div class="col-md-3 my-auto text-center">
                                    <p class="mb-0">{{$dataPendudukUsia["dibawah15tahun"]}} %</p>
                                </div>
                                <div class="col-md-3 my-auto text-center">
                                    <img src="{{asset('assets/img/kependudukan/kid.png')}}" class="rounded-circle img-responsive" width="100px" height="100px" alt="">
                                </div>
                                <div class="col-md-6 my-auto text-center">
                                    <p class="mb-0"><small>Berusia dibawah <span><b>15 tahun</b></span></small></p>
                                </div>
                            </div>
                            <div class="row mx-2 my-2">
                                <div class="col-md-3 my-auto text-center">
                                    <p class="mb-0">{{$dataPendudukUsia["diantara"]}} %</p>
                                </div>
                                <div class="col-md-3 my-auto text-center">
                                    <img src="{{asset('assets/img/kependudukan/parent.png')}}" class="rounded-circle img-responsive" width="100px" height="100px" alt="">
                                </div>
                                <div class="col-md-6 my-auto text-center">
                                    <p class="mb-0"><small>Berusia antara <span><b>15-65 tahun</b></span></small></p>
                                </div>
                            </div>
                            <div class="row mx-2 my-2">
                                <div class="col-md-3 my-auto text-center">
                                    <p class="mb-0">{{$dataPendudukUsia["diatas65tahun"]}} %</p>
                                </div>
                                <div class="col-md-3 my-auto text-center">
                                    <img src="{{asset('assets/img/kependudukan/grandparent.png')}}" class="rounded-circle img-responsive" width="100px" height="100px" alt="">
                                </div>
                                <div class="col-md-6 my-auto text-center">
                                    <p class="mb-0"><small>Berusia diatas <span><b>65 tahun</b></span></small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-4">
                            <h5 class="sub-title mb-3">Total</h5>
                            <div class="rounded-circle total-penduduk-circle m-auto text-center d-flex justify-content-center">
                                <div class="my-auto"><h5>{{$dataPendudukUsia["totalPenduduk"]}} Jiwa</h5></div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <h5 class="sub-title mb-3">Berdasarkan Gender</h5>
                            <input type="hidden" id="totalLakiLaki" value="{{$dataPendudukUsia['totalLakiLaki']}}" >
                            <input type="hidden" id="totalPerempuan" value="{{$dataPendudukUsia['totalPerempuan']}}" >
                            <div id="chartBerdasarkanGender"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="sub-title mb-4">Kelompok Usia</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-8 p-4">
                            <input type="hidden" id="kependudukan" value='<?php echo json_encode($kependudukan) ?>'>
                            <div id="chartBerdasarkanUmur"></div>
                        </div>
                        <div class="col-sm-4 my-auto">
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <img src="{{asset('assets/img/kependudukan/strong.png')}}" class="rounded-circle img-responsive" width="500px" height="100px" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <p>{{$dataPendudukUsia["totalProduktif"]}} % berada di usia <b>produktif</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <img src="{{asset('assets/img/kependudukan/weak.png')}}" class="rounded-circle img-responsive" width="500px" height="100px" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <p>{{$dataPendudukUsia["totalTidakProduktif"]}} % berada di usia <b>tidak produktif</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="sub-title mb-4">Pendidikan</h4>
                    <hr>
                    <div class="row py-4">
                        <div class="col-md-2 col-sm-0 col-lg-3"></div>
                        <div class="col-md-8 col-sm-12 col-lg-6">                            
                            <input type="hidden" id="pendidikan" value='<?php echo json_encode($pendidikan) ?>'>
                            <div id="chartBerdasarkanPendidikan"></div>
                        </div>
                        <div class="col-sm-2 col-sm-0 col-lg-3"></div>
                    </div>
                </div>
            </div>

        </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
    
    @endsection

    @section("contentjs")
        <script type="text/javascript" src="{{asset('assets/js/kependudukan.js')}}"></script>
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