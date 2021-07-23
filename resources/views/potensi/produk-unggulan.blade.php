<x-dashboard>
    @section("content")

    <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Potensi</h2>
            <ol>
                <li><a href="index.html">Potensi</a></li>
                <li>Produk Unggulan</li>
            </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us pt-10">
      <div class="container" data-aos="fade-up">

        <!-- Header -->

        <div class="row content">
          <div class="col-lg-12" data-aos="fade-right">
              
            <div class="underline-title">
                <h3>Produk Unggulan</h3>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
              @foreach($produkUnggulan as $v)
              <div class="col">
                <div class="card h-100">
                  <img src="{{asset($v->foto)}}" class="card-img-top" height="200px">
                  <div class="card-body">
                    <h5 class="card-title mb-0">{{$v->nama}}</h5>
                    <div class="card-text row-4 text-ellipsis-4" style="text-align:justify"><?php echo $v->deskripsi ?></div>
                  </div>
                  <div class="card-footer">
                    <small class="text-success"><a href="{{route('potensi.produk-unggulan.detail', $v->id)}}">Baca Selengkapnya...</a></small>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="text-center">
                <a href="{{$produkUnggulan->previousPageUrl()}}">
                    <i class="bx bx-left-arrow-alt"></i>
                </a>
                @for($i=1;$i<=$produkUnggulan->lastPage();$i++)
                    <a href="{{$produkUnggulan->url($i)}}">{{$i}}</a>
                @endfor
                <a href="{{$produkUnggulan->nextPageUrl()}}">
                    <i class="bx bx-right-arrow-alt"></i>
                </a>
            </div>
          </div>
        </div>

      </div>
    </section>
    @endsection
</x-dashboard>