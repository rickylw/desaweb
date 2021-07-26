<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{route('beranda')}}"><span>Com</span>pany</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="{{route('beranda')}}" class="active">Beranda</a></li>

          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="{{route('profil.sejarah')}}">Sejarah</a></li>
                <li><a href="{{route('profil.wilayah-geografis')}}">Wilayah Geografis</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Organisasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{route('organisasi.struktur-organisasi')}}">Struktur Organisasi</a></li>
              <li><a href="{{route('organisasi.visi-misi')}}">Visi Misi</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Potensi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{route('potensi.kependudukan')}}">Kependudukan</a></li>
              <li><a href="{{route('potensi.anggaran')}}">Anggaran</a></li>
              <li><a href="{{route('potensi.produk-unggulan')}}">Produk Unggulan</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Umum</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{route('register')}}">Register</a></li>
              <li><a href="{{route('galeri')}}">Galeri</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="{{route('informasi-lain')}}"><span>Informasi Lain</span></a>
          </li>

          @if(session('login'))
            <li><a href="{{route('logout')}}">Logout</a></li>
          @else
            <li><a href="{{route('login.index')}}">Login</a></li>
          @endif

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <form class="d-flex mx-2" action="{{route('berita.cari')}}" method="GET">
            <input class="form-control" type="search" placeholder="Pencarian" aria-label="Search" name="kataKunci">
            <button class="btn btn-success mx-1" type="submit">Cari</button>
        </form>
      </div>

    </div>
</header>