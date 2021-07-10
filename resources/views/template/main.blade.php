<!DOCTYPE html>
<html lang="ID-id" xmlns:livewire="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>MIMPI INDONESIA</title>

    <meta content="" name="title">
    <meta content="@yield('description')" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/logo/mimpi-indonesia-fix.png')}}" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <livewire:styles/>

    <!-- Scripts -->
    <script defer src="{{ asset('vendor/alpine.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
</head>

<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:yayasan.mimpiindonesia@gmail.com">yayasan.mimpiindonesia@gmail.com</a>
        <i class="icofont-phone"></i> <a href="https://wa.me/6282139283179">+62 82139283179</a>
      </div>
      <div class="social-links">
        <a href="https://twitter.com/YayasanMimpi" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/mimpi_indonesia/" class="instagram"><i class="icofont-instagram"></i></a>
      </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="{{ route('main-landing') }}" class="logo"><img style="margin-right: 10px" src="assets/img/logo/mimpi-indonesia-fix.png" alt=""></a>
      <h3 class="logo mr-auto">MIMPI <span style="color: #dd0000">INDONESIA</span></h3>
      <!-- Uncomment below if you prefer to use an image logo -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
            <li class="{{ Request::routeIs('main-landing') ? 'active' : '' }}"><a href="{{ route('main-landing') }}">Beranda</a></li>
            <li class="{{ Request::routeIs('gallery') ? 'active' : '' }}"><a href="{{ route('gallery') }}">Galeri</a></li>
            <li class="{{ Request::routeIs('blog') ? 'active' : '' }}"><a href="{{ route('blog') }}">Berita</a></li>
            <li class="{{ Request::routeIs('about') ? 'active' : '' }}"><a href="{{ route('about') }}">Tentang Kami</a></li>
{{--          <li><a href="">Aspirasi</a></li>--}}
          <!-- <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li> -->

            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

@if(Route::is('gallery') or Route::is('about') or Route::is('blog') or Route::is('blog-show'))
    <main id="main" data-aos="fade-up">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>@yield('pagename')</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>@yield('pagename')</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->


        @yield('content')

    </main><!-- End #main -->
@endif

@if(Route::is('main-landing'))
    @yield('content')
@endif
<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Subscribe</h4>
            <p>Masukkan e-mail anda untuk mendapat informasi up-to-date dari kami.</p>
            <form class="sweet" action="{{ route('subscribe') }}" method="post">
                @csrf
                <input class="sweet" type="email" name="email"><input class="sweet" type="submit" value="Subscribe">
            </form>
          </div>
        </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-contact">
              <h3 class="logo mr-auto">MIMPI <span style="color: #dd0000">INDONESIA</span></h3>
            <p>
              Jl. Tawang Mangu 6, No. 10 <br>
              Sumbersari, Jember, Jawa Timur <br>
              Indonesia <br><br>
              <strong>Telepon:</strong> +62 82139283179<br>
              <strong>Email:</strong> yayasan.mimpiindonesia@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Halaman Website</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('main-landing') }}">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('gallery') }}">Galeri</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('blog') }}">Berita</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about') }}">Tentang Kami</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Sosial Media Kami</h4>
            <p>Ikuti perkembangan lebih lanjut melalui <br> sosial media kami: </p>
            <div class="social-links mt-3">
              <a href="https://twitter.com/YayasanMimpi" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/mimpi_indonesia/" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

{{--  ==============--}}
  <style>
      .owl-carousel .item {
          height: 10rem;
          background: #4DC7A0;
          padding: 1rem;
      }
      .owl-carousel .item h4 {
          color: #FFF;
          font-weight: 400;
          margin-top: 0rem;
      }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
      document.querySelector(".sweet").addEventListener('click', function(){
          Swal.fire("Our First Alert", "With some body text and success icon!", "success");
      });
  </script>
  <script>
      jQuery(document).ready(function($){
          $('.owl-carousel').owlCarousel({
              loop:true,
              margin:10,
              nav:false,
              responsive:{
                  0:{
                      items:1
                  },
                  600:{
                      items:3
                  },
                  1000:{
                      items:4
                  }
              }
          })
      })
  </script>
{{--  ==========================--}}

<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/vendor/counterup/counterup.min.js')}}"></script>
<script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>
@livewireScripts
</body>

</html>
