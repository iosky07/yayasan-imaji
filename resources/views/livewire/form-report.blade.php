<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-input type="text" title="Judul" model="report.title"/>

        <x-summernote title="Isi Konten" model="report.contents"/>

        <x-input type="file" title="File" model="thumbnail"/>
        <div wire:loading wire:target="thumbnail">
            Proses upload, Harap tunggu...
        </div>
        @if($action=='create')
            @if($thumbnail)
                <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
            @endif
        @else
            @if($thumbnail)
                <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
            @else
                <img src="{{ asset('storage/thumbnail/report/'.$this->content['thumbnail']) }}" alt="" style="max-height: 300px">
            @endif
        @endif

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
    {{--    console.log({{$data['content']}})--}}
</div>

<script>
    document.addEventListener('livewire:load', function () {
        window.livewire.on('redirect', () => {
            setTimeout(function () {
                window.location.href = "{{route('admin.report.index')}}"; //will redirect to your blog page (an ex: blog.html)
            }, 2000); //will call the function after 2 secs.
        });
    });
</script>

