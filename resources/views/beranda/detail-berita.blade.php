<x-dashboard>
    @section("content")
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Berita</h2>
            <ol>
                <li><a href="index.html">Beranda</a></li>
                <li>Berita</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                <div class="col-lg-8" data-aos="fade-right">
                    
                    <h3>Judul Berita</h3>
                    <ul class="list-description list-inline">
                        <li class="list-inline-item"><small><i class="bi bi-clock" id="item-description"></i> 19 Juli 2021</small></li>
                        <li class="list-inline-item">
                            <small><i class="bi bi-person" id="item-description"></i> 12 Like</small>
                        </li>
                        <li class="list-inline-item"><small><i class="bi bi-chat-dots" id="item-description"></i> 12 Komentar</small></li>
                    </ul>
                    <img src="{{asset('assets/img/slide/slide-3.jpg')}}" class="img-fluid center-image mb-4" alt="...">
                    <div class="isi-berita">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has</p>

                        
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has</p>
                        
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has</p>
                        
                    </div>

                    <hr>
                    
                    <div>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><h6>Kolom Komentar</h6></li>
                            <li class="list-inline-item">
                                <a href=""><i class="bi bi-heart" id="icon-like"></i></a>
                            </li>
                        </ul>
                        <form action="" method="POST">
                            <textarea rows="4" class="form-control" id="komentar"></textarea>
                            <div class="text-end">                                
                                <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                            </div>
                        </form>
                    </div>
                    
                    <hr>

                    <div>
                        <h6>Komentar (12)</h6>
                        @for($i = 0; $i < 3; $i++)
                            <div class="card px-3 py-2 my-2">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><img src="{{asset('assets/img/kependudukan/kid.png')}}" class="rounded-circle img-fluid" width="100px" height="100px" alt=""></li>
                                    <li class="list-inline-item mx-2">
                                        <p class="mb-0"><small><b>John Smith</b></small></p>
                                        <p style="font-size: 12px"><small>21 Juni 2021</small></p>
                                    </li>
                                </ul>
                                <p class="isi-komentar">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        @endfor
                    </div>
                </div>
    
                <div class="col-lg-4 pt-4 pt-lg-0" data-aos="fade-left">
                    <div class="underline-title">
                        <h3>Populer</h3>
                    </div>
                    @for($i = 0; $i < 5; $i++)
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
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
    @endsection
</x-dashboard>