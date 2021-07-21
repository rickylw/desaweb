<x-dashboard>
    @section("content")
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Anggaran</h2>
            <ol>
                <li><a href="index.html">Potensi</a></li>
                <li>Anggaran</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                <div>
                    <div class="card text-white col mb-4">
                        <div class="card-header bg-primary d-flex justify-content-between">
                            <div class="my-auto"><b>APBD Tahun Anggaran</b></div>

                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="btnTahunAnggaran" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{$anggaran[count($anggaran)-1]->tahun_anggaran}}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnTahunAnggaran">
                                    @foreach($anggaran as $anggarans)
                                        <li><a class="dropdown-item" href="#">{{$anggarans->tahun_anggaran}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card-body text-dark">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card text-dark bg-light mb-3 text-center">
                                        <div class="card-header"><b>Anggaran Pendapatan</b></div>
                                        <div class="card-body">
                                            <h3>Rp{{number_format($anggaran[count($anggaran)-1]->anggaran_pendapatan)}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card text-dark bg-light mb-3 text-center">
                                        <div class="card-header"><b>Realisasi Pendapatan</b></div>
                                        <div class="card-body">
                                            <h3>Rp{{number_format($anggaran[count($anggaran)-1]->realisasi_pendapatan)}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card text-dark bg-light mb-3 text-center">
                                        <div class="card-header"><b>Realisasi Belanja</b></div>
                                        <div class="card-body">
                                            <h3>Rp{{number_format($anggaran[count($anggaran)-1]->realisasi_belanja)}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card text-white col mb-4">
                        <div class="card-header bg-primary">
                            <div class="my-auto"><b>Pendapatan Desa</b></div>
                        </div>
                        <div class="card-body text-dark">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="hidden" id="kategoriAnggaran" value='<?php echo json_encode($kategoriAnggaran) ?>'>
                                    <input type="hidden" id="detailAnggaran" value='<?php echo json_encode($detailAnggaran) ?>'>
                                    <div id="chartPiePendapatanDesa"></div>
                                </div>
                                <div class="col-sm-8">
                                    <div id="chartLinePendapatanDesa"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card text-white col mb-4">
                        <div class="card-header bg-primary">
                            <div class="my-auto"><b>Belanja Desa</b></div>
                        </div>
                        <div class="card-body text-dark">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div id="chartPieBelanjaDesa"></div>
                                </div>
                                <div class="col-sm-8">
                                    <div id="chartLineBelanjaDesa"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
    @endsection

    @section("contentjs")
        <script type="text/javascript" src="{{asset('assets/js/anggaran.js')}}"></script>
    @endsection
</x-dashboard>