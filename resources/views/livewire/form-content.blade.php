<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-input type="text" title="Judul" model="content.title"/>

{{--        <x-summernote title="Isi Konten" model="report.contents"/>--}}
        <x-summernote title="Isi Konten" model="content.contents"/>

        <x-input type="file" title="File Gambar" model="thumbnail"/>
        <div wire:loading wire:target="thumbnail">
            Proses upload
        </div>
        @if($action=='create')
            @if($thumbnail)
                <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
            @endif
        @else
            @if($thumbnail)
                <img src="{{$thumbnail->temporaryUrl()}}" alt="" style="max-height: 300px">
            @else
                <img src="{{ asset('storage/thumbnail/content/'.$this->content['thumbnail']) }}" alt="" style="max-height: 300px">
            @endif
        @endif

        <br>
        <x-select :options="$optionTypes" :selected="$content['type_id']" title="Tipe" model="content.type_id"/>

        <x-select2 :options="$optionTags" :selected="$contentTags" title="Tag" model="contentTags"/>

        @if(auth()->user()->role==1)
            <x-select :options="$optionStatus" :selected="$content['status']" title="Status" model="content.status"/>
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
                window.location.href = "{{route('admin.content.index')}}"; //will redirect to your blog page (an ex: blog.html)
            }, 2000); //will call the function after 2 secs.
        });
    });
</script>
