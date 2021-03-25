@extends('template.main')
@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Selamat datang di Website Mimpi Indonesia.</h1>
      <h2>Yayasan Mimpi Indonesia adalah Yayasan yang baik dan benar..</h2>
      <!-- <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
      </div> -->
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Galeri</h2>
          <h3>Dokumentasi <span>Kegiatan</span></h3>
          <p>Berikut merupakan dokumentasi kegiatan kami</p>
        </div>

        <div class="owl-carousel owl-theme mt-5">
            @foreach($galleries as $m)
                <div class="" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="{{ asset('storage/thumbnail/gallery/'.$m->thumbnail) }}" class="img-fluid" alt="">
                        </div>
                </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Featured Services Section -->

{{--      <div class="owl-carousel owl-theme mt-5">--}}
{{--          <div class="item"><h4>1</h4></div>--}}
{{--          <div class="item"><h4>2</h4></div>--}}
{{--          <div class="item"><h4>3</h4></div>--}}
{{--          <div class="item"><h4>4</h4></div>--}}
{{--          <div class="item"><h4>5</h4></div>--}}
{{--          <div class="item"><h4>6</h4></div>--}}
{{--          <div class="item"><h4>7</h4></div>--}}
{{--          <div class="item"><h4>8</h4></div>--}}
{{--          <div class="item"><h4>9</h4></div>--}}
{{--          <div class="item"><h4>10</h4></div>--}}
{{--          <div class="item"><h4>11</h4></div>--}}
{{--          <div class="item"><h4>12</h4></div>--}}
{{--      </div>--}}

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>BERITA</h2>
          <h3>Berita <span>Terbaru</span></h3>
          <p>Berita terbaru seputar Yayasan Mimpi Indonesia</p>
        </div>

        <div class="row">
          @foreach($content as $c)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
{{--                {{$c->thumbnail}}--}}
              <div class="gambar"><img src="{{ asset('storage/thumbnail/content/'.$c->thumbnail) }}" class="img-fluid" alt=""></div>
              <h4><a href="{{ route('blog-show', $c->id) }}">{{ $c->title }}</a></h4>
              <p>{!!Str::limit($c->contents,100, '...')!!}</p>
            </div>
          </div>
        @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Portfolio Section ======= -->
      <section id="services" class="services">
          <div class="container" data-aos="fade-up">

              <div class="section-title">
                  <h2>MEDSOS</h2>
                  <h3><span>Instagram</span></h3>
                  <p>Ikuti kegiatan kami melalui instagram selengkapnya.</p>
              </div>

              <div class="row" data-aos="fade-up" data-aos-delay="200">
                  @foreach($instagram as $a)
                      <div class="col-lg-4 col-md-2">
                          {!!$a->link!!}
                      </div>
                  @endforeach

              </div>

          </div>
      </section>

  </main><!-- End #main -->

@endsection


