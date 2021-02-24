@extends('template.main')
<!-- ======= Featured Services Section ======= -->
@section('pagename','Peraturan')
@section('content')

<section id="featured-services" class="featured-services">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>JDIH</h2>
      <h3>Jaringan Dokumen dan Informasi Hukum</h3>
      <p>JDIH adalah wadah pendayagunaan bersama atas dokumen hukum secara tertib, terpadu, dan berkesinambungan, serta merupakan sarana pemberian pelayanan informasi hukum secara lengkap, akurat, mudah dan cepat.</p>
        <br><livewire:search-regulation/>
      </div>
  </div>
</section><!-- End Featured Services Section -->
@endsection
