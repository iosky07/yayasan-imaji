<div>
    <div class="search">
        <div class="search-bar">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <input wire:model="search" class="col-lg-12 form-control" type="text" name="search" placeholder="Cari Peraturan" >
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    @foreach($rules as $r)
        <a href="index.html">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4 class="title"><a href="">{{ $r->title }} Lorem Ipsum</a></h4>
                    <p class="description">{{ $r->clickbait }}</p>
                </div>
            </div>
        </a>
    @endforeach

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    {{$rules->onEachSide(1)->links()}}
                </div>
            </div>
        </div>

</div><!-- End Row -->



