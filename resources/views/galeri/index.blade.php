<x-dashboard>
    @section("content")
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
                @for($i = 0; $i < 4; $i++)
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3">
                    <div class="hovereffect">
                        <img class="img-fluid mx-auto" src="{{asset('assets/img/slide/slide-3.jpg')}}" alt="">
                        <div class="overlay">
                           <h2>Hover effect 1</h2>
                           <a class="info" href="{{route('galeri.detail')}}">Buka Galeri</a>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

        </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
    @endsection
</x-dashboard>