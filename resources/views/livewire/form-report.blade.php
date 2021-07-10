<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-input type="text" title="Judul" model="report.title"/>

        <x-summernote title="Isi Konten" model="report.content"/>

        <x-input type="file" title="File" model="file"/>
        <div wire:loading wire:target="file">
            Proses upload, Harap tunggu...
        </div>
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

