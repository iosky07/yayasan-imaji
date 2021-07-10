@extends('template.main')

@section('pagename','Berita')

@section('content')
    <!-- ======= Portfolio Details Section ======= -->
    <section class="portfolio-details">
        <div class="container">
            <div class="portfolio-details-container">

                <img src="{{ asset('storage/thumbnail/content/'.$c->thumbnail) }}" class="img-fluid" alt="">

                <div class="portfolio-info">
                    <h3>Informasi Berita</h3>
                    <ul>
                        <li><strong>Penulis</strong>: {{ $c->user->name }}</li>
                        <li><strong>Waktu Publish</strong>: {{ $c->created_at->format('d F Y') }}</li>
                        <li><strong>Dilihat sebanyak</strong>: {{ $c->view }}</li>
                    </ul>
                </div>

            </div>

            <div class="portfolio-description">
                <h2>{{ $c->title }}</h2>
                <p>
                    {!! $c->contents !!}
                </p>
            </div>
        </div>
    </section><!-- End Portfolio Details Section -->

@endsection
