<x-dashboard>
    @section("content")
    <?php $PATH = 'http://127.0.0.1:8000/' ?>
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Galeri</h2>
            <ol>
                <li><a href="{{route('galeri')}}">Galeri</a></li>
                <li>{{$galeri[0]->nama_kategori}}</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                @foreach($galeri as $v)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3">
                        <div class="hovereffect">
                            <img class="img-fluid mx-auto" height="150px" src="{{$PATH.$v->foto}}" alt="">
                            <div class="overlay">
                            <h2 class="text-ellipsis-1"><?php echo $v->deskripsi ?></h2>
                            <a class="info" data-bs-toggle="modal" data-bs-target="#modal{{$v->id}}" role="button">Detail Foto</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->

    @foreach ($galeri as $v)
        <div class="modal fade" id="modal{{$v->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$v->nama_kategori}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body isi-berita">
                    <img class="img-fluid mx-auto mb-3" src="{{$PATH.$v->foto}}" alt="">
                    <?php echo $v->deskripsi ?>
                </div>
                </div>
            </div>
        </div>        
    @endforeach

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