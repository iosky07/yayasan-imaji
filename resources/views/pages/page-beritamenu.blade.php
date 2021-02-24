@extends('template.main')
<!-- ======= Featured Services Section ======= -->
@section('pagename','Berita')
@section('content')

<section id="services" class="services">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>BERITA</h2>
      <h3>Berita Terbaru BLM PKN STAN</h3>
      <p>Tetap ikuti perkembangan dengan membaca berita-berita terbaru kami hari ini.</p><br>
      <livewire:search-content/>
    </div>
  </div>
</section><!-- End Featured Services Section -->
@endsection