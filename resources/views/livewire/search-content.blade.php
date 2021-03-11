<div>
    <div>
        <div class="search">
            <div class="search-bar">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                          <input wire:model="search" class="col-lg-12 form-control" type="text" name="search" placeholder="Cari Berita" >

{{--                            {{$content->count()}}--}}
                            <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($content as $c)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" >
                <div class="icon-box">
                    <div class="gambar"><img src="{{ asset('storage/thumbnail/content/'.$c->thumbnail) }}" class="img-fluid" alt="">
                    </div>
                    <h4><a href="{{ route('blog-show', $c->id) }}">{{ $c->title }}</a></h4>
                    <p>{!!Str::limit($c->contents,100, '...')!!}</p>
                </div>
            </div>
        @endforeach

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        {{$content->onEachSide(1)->links()}}
                    </div>
                </div>
            </div>

    </div>
</div>
