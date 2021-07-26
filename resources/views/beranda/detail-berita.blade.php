<x-dashboard>
    @section("content")
    <?php $PATH = 'http://127.0.0.1:8000/' ?>
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Berita</h2>
            <ol>
                <li><a href="{{route('beranda')}}">Beranda</a></li>
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
                    
                    <h3>{{$beritaDetail->judul}}</h3>
                    <ul class="list-description list-inline">
                        <li class="list-inline-item"><small><i class="bi bi-clock" id="item-description"></i> {{date('d M Y', strtotime($beritaDetail->dibuat))}}</small></li>
                        <li class="list-inline-item">
                            <small><i class="bi bi-person" id="item-description"></i> 
                                @if ($beritaDetail->jumlah_like == null)
                                    0
                                @else
                                    {{$beritaDetail->jumlah_like}}
                                @endif
                                Like</small>
                        </li>
                        <li class="list-inline-item"><small><i class="bi bi-chat-dots" id="item-description"></i> 
                            @if ($beritaDetail->jumlah_komentar == null)
                                0
                            @else
                                {{$beritaDetail->jumlah_komentar}}
                            @endif
                            Komentar</small></li>
                    </ul>
                    <img src="{{$PATH.$beritaDetail->foto}}" class="img-fluid center-image mb-4" alt="...">
                    <div class="isi-berita">
                        <?php echo $beritaDetail->isi ?>
                    </div>

                    @if (session('login'))
                        <hr>
                        
                        <div>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><h6>Kolom Komentar</h6></li>
                                <li class="list-inline-item" id="list-like">
                                    <form action="{{route('berita.like', $beritaDetail->id)}}" method="POST" id="form-like">
                                        @csrf
                                        @method("POST")
                                        @if ($like == null)
                                            <a class="ml-3" id="tombol-like" status="0"><i class="bi bi-hand-thumbs-up" id="icon-like"></i></a>
                                            <small>Suka</small>
                                            <input type="hidden" name="like" id="like">
                                            <a class="ml-3" id="tombol-dislike" status="0"><i class="bi bi-hand-thumbs-down" id="icon-dislike"></i></a>
                                            <small>Tidak Suka</small>
                                        @else
                                            <a class="ml-3" id="tombol-like" status="<?php echo ($like->status == 1) ? '1' : '0' ?>"><i class="bi bi-hand-thumbs-up<?php echo ($like->status == 1) ? '-fill' : '' ?>" id="icon-like"></i></a>
                                            <small>Suka</small>
                                            <input type="hidden" name="like" id="like" value="{{$like->status}}">
                                            <a class="ml-3" id="tombol-dislike" status="<?php echo ($like->status == 0) ? '1' : '0' ?>"><i class="bi bi-hand-thumbs-down<?php echo  ($like->status == 0) ? '-fill' : '' ?>" id="icon-dislike"></i></a>
                                            <small>Tidak Suka</small>
                                        @endif
                                    </form>
                                </li>
                            </ul>
                            <form action="{{route('berita.komentar',$beritaDetail->id)}}" method="POST">
                                @csrf
                                @method("POST")
                                <textarea rows="4" class="form-control" id="komentar" name="komentar"></textarea>
                                <div class="text-end">                                
                                    <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                                </div>
                            </form>
                        </div>
                    @endif
                    
                    <hr>

                    <div>
                        <h6>Komentar ({{count($komentar)}})</h6>
                        @foreach($komentar as $v)
                            <div class="card px-3 py-2 my-2">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><img src="{{asset('assets/img/kependudukan/kid.png')}}" class="rounded-circle img-fluid" width="100px" height="100px" alt=""></li>
                                    <li class="list-inline-item mx-2">
                                        <p class="mb-0"><small><b>{{$v->nama_masyarakat}}</b></small></p>
                                        <p style="font-size: 12px"><small>{{date('d M Y H:i', strtotime($v->tanggal))}}</small></p>
                                    </li>
                                </ul>
                                <p class="isi-komentar">{{$v->komentar}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
    
                <div class="col-lg-4 pt-4 pt-lg-0" data-aos="fade-left">
                    <div>
                        <div class="underline-title">
                            <h3>Populer</h3>
                        </div>
                        @foreach($beritaPopuler as $v)
                            <div class="card mb-3 border-0">
                                <div class="row g-0">
                                <div class="col-md-6">
                                    <a href="{{route('berita.detail', $v->id)}}">
                                      <img src="{{$PATH.$v->foto}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body pt-0">
                                    <h6 class="card-title">{{$v->judul}}</h6>
                                    <ul class="list-description px-0">
                                        <li class="d-flex align-items-center"><small><i class="bi bi-clock" id="item-description"></i> {{date('d M Y', strtotime($v->dibuat))}}</small></li>
                                        <li class="d-flex align-items-center">
                                        <small><i class="bi bi-person" id="item-description"></i> 
                                            @if ($v->jumlah_like == null)
                                                0
                                            @else
                                                {{$v->jumlah_like}}
                                            @endif
                                            Like</small>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                </div>
                            </div>                        
                        @endforeach
                    </div>
                    <div>
                        <div class="underline-title">
                            <h3>Informasi Lainnya</h3>
                        </div>
                        @foreach($beritaInformasiLainnya as $v)
                            <div class="card mb-3 border-0">
                                <div class="row g-0">
                                <div class="col-md-6">
                                    <a href="{{route('berita.detail', $v->id)}}">
                                      <img src="{{$PATH.$v->foto}}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body pt-0">
                                    <h6 class="card-title">{{$v->judul}}</h6>
                                    <ul class="list-description px-0">
                                        <li class="d-flex align-items-center"><small><i class="bi bi-clock" id="item-description"></i> {{date('d M Y', strtotime($v->dibuat))}}</small></li>
                                        <li class="d-flex align-items-center">
                                        <small><i class="bi bi-person" id="item-description"></i> 
                                            @if ($v->jumlah_like == null)
                                                0
                                            @else
                                                {{$v->jumlah_like}}
                                            @endif
                                            Like</small>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
    @endsection

    @section('contentjs')
        <script src="{{asset('assets/js/detail-berita.js')}}"></script>
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