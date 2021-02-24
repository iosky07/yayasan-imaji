<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-input type="text" title="Judul" model="blog.title"/>

{{--        <x-date type="text" title="datetimepiku" model="blog.jj" type="datepicker"/>--}}

{{--        <x-time title="sa" model="blog.time" :time="$blog['time']"/>--}}

{{--        <x-daterange title="sa" model="blog.timeaaa" />--}}

        <x-summernote title="Isi Konten" model="blog.contents"/>

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
                <img src="{{ asset('storage/thumbnail/'.$this->blog['thumbnail']) }}" alt="" style="max-height: 300px">
            @endif
        @endif

        <br>
        <x-select :options="$optionStatus" :selected="$blog['status']" title="Status" model="blog.status"/>

        <x-select2 :options="$optionTags" :selected="$blogTags" title="Tag" model="blogTags"/>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
    {{--    console.log({{$data['content']}})--}}
</div>

<script>
    document.addEventListener('livewire:load', function () {
        window.livewire.on('redirect', () => {
            setTimeout(function () {
                window.location.href = "{{route('admin.blog.index')}}"; //will redirect to your blog page (an ex: blog.html)
            }, 2000); //will call the function after 2 secs.
        });
    });
</script>
