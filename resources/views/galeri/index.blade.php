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
                <li>Galeri</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                <?php $k = 1 ?>
                @foreach($galeri as $v)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3">
                        <div class="hovereffect">
                            <img class="img-fluid mx-auto" height="150px" src="{{$PATH.$v->foto}}" alt="">
                            <div class="overlay">
                            <h2 class="text-ellipsis-1"><?php echo $v->deskripsi ?></h2>
                            <a class="info" href="{{route('galeri.detail', $v->id_kategori_galeri)}}">Buka Galeri</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center mt-4">
                    <a href="{{$galeri->previousPageUrl()}}">
                        <i class="bx bx-left-arrow-alt"></i>
                    </a>
                    @for($i=1;$i<=$galeri->lastPage();$i++)
                        <a href="{{$galeri->url($i)}}">{{$i}}</a>
                    @endfor
                    <a href="{{$galeri->nextPageUrl()}}">
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
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